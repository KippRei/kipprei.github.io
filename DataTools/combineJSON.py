#Combines game info and game cover JSON files
import os, sys, json

infoFileName = sys.argv[1]
coverFileName = sys.argv[2]
screenshotFileName = sys.argv[3]

infoFile = open("../GameData/" + infoFileName + ".json", "r") 
coverFile = open("../GameData/" + coverFileName + ".json", "r")
screenshotFile = open("../GameData/" + screenshotFileName + ".json", "r")
platformEnumFile = open("../GameData/_platforms.json", "r")

# json file that will have all information combined
newFile = open("../GameData/gamesInfo.json", "w")

# Parse json files
parsedInfo = json.load(infoFile)
parsedCover = json.load(coverFile)
parsedScreenshots = json.load(screenshotFile)
parsedPlatforms = json.load(platformEnumFile)

# Loop through each game and add fields:
# platformByName, screenshots, and cover_url
for game in parsedInfo:
    plats = []
    for gamePlat in game['platforms']:
        for p in parsedPlatforms:
            if gamePlat == p['id']:
                plats.append(p['name'])
    game['platformsByName'] = plats

    shotsURL = []
    for screenshot in parsedScreenshots:
        if game['id'] == screenshot['game']:
            s = screenshot['url'][screenshot['url'].rindex("/")+1:]
            s = s.replace("t_thumb", "t_screenshot_med")
            shotsURL.append(s)
    game['screenshots'] = shotsURL

    # NOTE: cover_url field must have only one entry for dlGameImages.py to work properly
    for cover in parsedCover:
        if game['id'] == cover['game']:
            url = cover['url'][cover['url'].rindex("/")+1:]
            url = url.replace("t_thumb", "t_cover_big")
            game['cover_url'] = url
            continue

newFile.write(json.dumps(parsedInfo, indent=2))

infoFile.close()
coverFile.close()
screenshotFile.close()
platformEnumFile.close()
newFile.close()

# Remove individual json files that are no longer needed (all this info was combined into the new json file created)
os.remove("../GameData/" + infoFileName + ".json")
os.remove("../GameData/" + coverFileName + ".json")
os.remove("../GameData/" + screenshotFileName + ".json")