import wikipedia
import json

def get_article():
    try:
        #wikipedia.random(1) is used to get a random article title
        page = wikipedia.page(wikipedia.random(1))

        data = {
            "title":page.title,
            "content":page.content[0:100],
            "url":page.url,
            "error":False
        }
        
        print(json.dumps(data))
    except wikipedia.exceptions.DisambiguationError:
        print(json.dumps({
            "error":True
        }))

if __name__ == '__main__':
    get_article()