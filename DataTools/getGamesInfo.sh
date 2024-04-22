### Reads from a list of games (gamesList.txt) and makes calls to igdb.com to get game information
### Usage: bash getGamesInfo.sh <path to igdb config file>
### [Config File Structure = "<client_id> \n <client_secret>"]

#Gets bearer token from IGDB
configFP=$1
mapfile -t credentials <$configFP
curl -X POST "https://id.twitch.tv/oauth2/token?client_id="nxgh4ecs7n261ig2lbvd8qh7p1mbi1"&client_secret="il4vssdx79avmjnpq0n64b3od2lna3"&grant_type=client_credentials" -o temp.json

python3 getToken.py temp.json

mapfile -t token <./token.txt
rm ./token.txt

authToken="${token[0]}"
gamesListFilePath="../GameData/_gamesList.txt"
gameInfoFileName="gamesData"
gameIDFileName="gameIDList"
screenshotIDFileName="screenshotIDList"
screenshotsFileName="screenshots"
gameCoversFileName="gameCovers"

declare -a games=()

#Reads games from text file into an array
while read -r line
do
    games+=("\"${line}\"")
done < ${gamesListFilePath}

#Creates new file for game info retrieved using IGDB API
echo "">../GameData/${gameInfoFileName}.txt

#Loops through games and makes calls to IGDB API to retrieve game info
#Saves info in a text file
for i in "${games[@]}"
do
    curl "https://api.igdb.com/v4/games" \
    -d "fields id, name, aggregated_rating, first_release_date, summary, url, platforms, screenshots; where name=${i};" \
    -H "Client-ID: "${credentials[0]}"" \
    -H "Authorization: Bearer ${authToken}" \
    -H "Accept: application/json" >>../GameData/${gameInfoFileName}.txt
done


#Takes text file created above and creates a valid json file
python3 jsonFormatter.py ${gameInfoFileName}

#Parses json file created above to make an ID list (text file) for making calls to IGDB API for cover art
python3 createIDList.py ${gameIDFileName} ${gameInfoFileName}

#Parses json file created above to make a screenshot ID list (text file) for making calls to IGDB API for screenshots
python3 createScreenshotIDList.py ${screenshotIDFileName} ${gameInfoFileName}


#Reads from ID list (text file) created above into an array
declare -a idArr=()

while read -r line
do
    idArr+=("${line}")
done < ../GameData/${gameIDFileName}.txt

#Creates new file for cover urls retrieved from IGDB
echo "">../GameData/${gameCoversFileName}.txt

#Loops through ID array and retrieves cover art url from IGDB
#Saves cover urls in a text file
for i in "${idArr[@]}"
do
    curl "https://api.igdb.com/v4/covers" \
    -d "fields game, url; where game=${i};" \
    -H "Client-ID: "${credentials[0]}"" \
    -H "Authorization: Bearer ${authToken}" \
    -H "Accept: application/json" >>../GameData/${gameCoversFileName}.txt
done

python3 jsonFormatter.py ${gameCoversFileName}

#Reads from ScreenshotID list (text file) created above into an array
declare -a screenshotIDArr=()

while read -r line
do
    screenshotIDArr+=("${line}")
done < ../GameData/${screenshotIDFileName}.txt

#Creates new file for cover urls retrieved from IGDB
echo "">../GameData/${screenshotsFileName}.txt

#Loops through ID array and retrieves cover art url from IGDB
#Saves cover urls in a text file
for i in "${screenshotIDArr[@]}"
do
    curl "https://api.igdb.com/v4/screenshots" \
    -d "fields game, url; where id=${i};" \
    -H "Client-ID: "${credentials[0]}"" \
    -H "Authorization: Bearer ${authToken}" \
    -H "Accept: application/json" >>../GameData/${screenshotsFileName}.txt
done

python3 jsonFormatter.py ${screenshotsFileName}

# Combines all json files into gamesInfo.json (in GameData dir)
python3 combineJSON.py ${gameInfoFileName} ${gameCoversFileName}  ${screenshotsFileName}

# Downloads screenshots and cover image for all games (in GameData dir)
python3 dlGameImages.py

# Clean up helper files
rm "../GameData/${gameIDFileName}.txt"
rm "../GameData/${screenshotIDFileName}.txt"