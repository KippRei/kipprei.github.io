# Run this script after getGamesInfo.sh to download all screenshots
# POTENTIAL BUG: Since the website pulls from IGDB using stored URLs, if IGDB removes and image and/or changes
# the image url, there will be a 404 for that image unless new gamesInfo.json is created with getGamesInfo.sh
# TODO: It's better to dl the screenshots at the same time as running getGamesInfo.sh but screenshot URLs will have
# to be modified

import json, os
from urllib.request import urlretrieve

gamesDataFile = open("../GameData/gamesInfo.json", "r")
gf = json.load(gamesDataFile)

imgURLList = []

for game in gf:
    gameDirName = str(game['id'])
    dirName = "../GameData/screenshots/" + gameDirName
    os.makedirs(dirName, exist_ok=True)
    count = 0
    for screenshotURL in game['screenshots']:
        newFileName = dirName +"/" + str(count) + ".jpg"
        newFile = open(newFileName, "w")
        url = "https://" + screenshotURL
        urlretrieve(url, newFileName)
        count += 1
        newFile.close()
