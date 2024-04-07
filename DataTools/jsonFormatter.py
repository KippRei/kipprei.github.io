# Custom formatter to format the gamesInfo.txt file created by getGamesInfo.sh (then remove txt file)
# Called by getGamesInfo.sh

import os, sys

fileName = sys.argv[1]
fileToFormat = open("../GameData/" + fileName + ".txt", "r")
newFile = open("../GameData/" + fileName + ".json", "w")

for line in fileToFormat.readlines():
    if line.startswith("]["):
        newFile.write(",")
    else:
        newFile.write(line)

fileToFormat.close()
newFile.close()

os.remove("../GameData/" + fileName + ".txt")