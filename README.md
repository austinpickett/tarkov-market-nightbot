This project is in development. 
This is a PHP wrapper to the Tarkov API: https://tarkov-market.com/

# Usage:
- Register for Heroku
- Download heroku CLI
- run `git clone https://github.com/austinpickett/tarkov-market-nightbot`
- run `cd tarkov-market-bot`
- run `heroku create`
- run `heroku config:set API_KEY=TARKOV_MARKET_API_KEY`
- run `git push heroku master`
- run `heroku open`
- Add the URL to nightbot as such:
  * Commands > Custom 
  * Command: whichever you want (we prefer !market or !m)
  * Message: `$(urlfetch HEROKU_DEPLOY_URL?q=$(query))`

requirements:
- heroku account
- PHP knowledge
- access to tarkov market api

todo:
- search for multiple words
