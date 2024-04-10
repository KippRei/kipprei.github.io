# Downloads screenshots and cover image of each game
# Creates dir with game ID as name and stores all images inside
# cover name: "cover.jpg"
# screenshot images are enumerated (i.e. "0.jpg", "1.jpg", etc.)

import json, os
from urllib.request import urlretrieve

imgURLPrefix = "https://images.igdb.com/igdb/image/upload/t_screenshot_med/"
coverURLPrefix = "https://images.igdb.com/igdb/image/upload/t_cover_big/"
gamesDataFile = open("../GameData/gamesInfo.json", "r")
completeGamesData = open("../GameData/completeGamesData.json", "w")
gf = json.load(gamesDataFile)

for game in gf:
    screenshotsFP = []
    
    gameDirName = str(game['id'])

    screenDirName = "/GameData/gameImages/" + gameDirName
    os.makedirs(".." + screenDirName, exist_ok=True)
    count = 0

    for screenshotURL in game['screenshots']:
        newFileName = screenDirName +"/" + str(count) + ".jpg"
        newFilePath = ".." + newFileName
        newFile = open(newFilePath, "w")
        url =  imgURLPrefix + screenshotURL
        urlretrieve(url, newFilePath)
        count += 1
        newFile.close()
        screenshotsFP.append(newFileName)

    coverFileName = screenDirName +"/" + "cover.jpg"
    coverFilePath = ".." + coverFileName
    coverFile = open(coverFilePath, "w")
    url = coverURLPrefix + game['cover_url']
    urlretrieve(url, coverFilePath)
    coverFile.close()
    coverFP = coverFileName

    game['screenshotFP'] = screenshotsFP
    game['coverFP'] = coverFP

completeGamesData.write(json.dumps(gf, indent=2))
completeGamesData.close()
gamesDataFile.close()

os.remove("../GameData/gamesInfo.json")