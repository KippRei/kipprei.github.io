# Custom formatter to format the gamesInfo.txt file created by getGamesInfo.sh (then remove txt file)
# Called by getGamesInfo.sh

import os

fileToFormat = open("../GameData/gamesInfo.txt", "r")
newFile = open("../GameData/gamesInfo.json", "w")

for line in fileToFormat.readlines():
    if line.strip() == "][":
        newFile.write(",")
    else:
        newFile.write(line)

fileToFormat.close()
newFile.close()

os.remove("../GameData/gamesInfo.txt")