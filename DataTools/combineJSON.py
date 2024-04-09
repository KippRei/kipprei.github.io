#Combines game info and game cover JSON files
import os, sys, json

infoFileName = sys.argv[1]
coverFileName = sys.argv[2]
screenshotFileName = sys.argv[3]

infoFile = open("../GameData/" + infoFileName + ".json", "r") 
coverFile = open("../GameData/" + coverFileName + ".json", "r")
screenshotFile = open("../GameData/" + screenshotFileName + ".json", "r")
platformEnumFile = open("../GameData/_platforms.json", "r")
newFile = open("../GameData/gamesInfo.json", "w")

parsedInfo = json.load(infoFile)
parsedCover = json.load(coverFile)
parsedScreenshots = json.load(screenshotFile)
parsedPlatforms = json.load(platformEnumFile)

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
            s = screenshot['url'][2:]
            s = s.replace("t_thumb", "t_screenshot_med")
            shotsURL.append(s)
    game['screenshots'] = shotsURL

    for cover in parsedCover:
        if game['id'] == cover['game']:
            url = cover['url'][2:]
            url = url.replace("t_thumb", "t_cover_big")
            game['cover_url'] = url
            continue

newFile.write(json.dumps(parsedInfo, indent=2))

infoFile.close()
coverFile.close()
screenshotFile.close()
platformEnumFile.close()
newFile.close()

os.remove("../GameData/" + infoFileName + ".json")
os.remove("../GameData/" + coverFileName + ".json")
os.remove("../GameData/" + screenshotFileName + ".json")