#Combines game info and game cover JSON files
import os, sys, json

infoFileName = sys.argv[1]
coverFileName = sys.argv[2]

infoFile = open("../GameData/" + infoFileName + ".json", "r") 
coverFile = open("../GameData/" + coverFileName + ".json", "r")
platformEnumFile = open("../GameData/_platforms.json", "r")
newFile = open("../GameData/gamesInfo.json", "w")

parsedInfo = json.load(infoFile)
parsedCover = json.load(coverFile)
parsedPlatforms = json.load(platformEnumFile)

for game in parsedInfo:
    plats = []
    for gamePlat in game['platforms']:
        for p in parsedPlatforms:
            if gamePlat == p['id']:
                plats.append(p['name'])
    game['platformsByName'] = plats
    for cover in parsedCover:
        if game['id'] == cover['game']:
            url = cover['url'][2:]
            url = url.replace("t_thumb", "t_cover_big")
            game['cover_url'] = url
            continue

newFile.write(json.dumps(parsedInfo, indent=2))

infoFile.close()
coverFile.close()
platformEnumFile.close()
newFile.close()

os.remove("../GameData/" + infoFileName + ".json")
os.remove("../GameData/" + coverFileName + ".json")