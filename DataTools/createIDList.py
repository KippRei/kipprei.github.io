# Creates list of game ID's that are used to get cover art (via IGDB API)
# Called by getGamesInfo.sh

import os, sys, json

newFileName = sys.argv[1]
jsonFileName = sys.argv[2]

jsonFile = open("../GameData/" + jsonFileName + ".json", "r") 
newFile = open("../GameData/" + newFileName + ".txt", "w")

parsedJSON = json.load(jsonFile)
jsonFile.close()

for game in parsedJSON:
    newFile.write(str(game['game_localizations'][0])+"\n")

newFile.close()