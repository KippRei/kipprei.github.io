import os, sys, json

file = open("./" + sys.argv[1], "r")
token = open("./token.txt", "w")
parseFile = json.load(file)
token.write(parseFile["access_token"])

token.close()
file.close()
os.remove("./" + sys.argv[1])