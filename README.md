# ZipCode Service 
## API
        
ZipCode service is the simplest way I've found to manage italian municipalities using RESTFul web services.
During my career I've always encountered problems related to this subject because, right now, a fully database
containing all informations related to every single Zip Code is not yet provided by no one (you have to pay for this 
stupid information using commercial data available online).

## Installation
This service, that you can install downloading and placing this repository on your server, works using
a very helpful existing project, [comuni-json](https://github.com/matteocontrini/comuni-json), from which
I've generated the `LocalDataResolver` and many other HTML scrapers created to retrieve data from many sites.

## Execute requests
After installation (download/copy/paste of this library) into your PHP environment, you can execute
GET requests to the index page like in this example:

`GET /index.php?zip_code=75100`

Every request returns something like this:
    
    {
       "error": false,
       "data": [
          {
             "name":"La Martella",
             "code":"75100",
             "region":"Basilicata",
             "country":"Italy",
             "zip_code":"75100",
             "province":"MT"
          }
       ]
    }

If provided Zip Code is related to multiple location (when the municipality is not italian you can encounter this
situation), you can receive multiple object into `data` array like in this example:
    
    {
       "error":false,
       "data":[
          {
             "name":"Miramar",
             "country":"Messico",
             "cap":"24094"
          },
          {
             "name":"Esmeralda II",
             "country":"Messico",
             "cap":"24094"
          },
          ...
          {
             "name":"Goldbond",
             "country":"Stati Uniti",
             "cap":"24094"
          }
       ]
    }

## Data Structure
Below you can see the full list of fields that each record into `data` array contains:

| Field | Description |
| --- | --- |
| name | Indicates the municipality name. |
| code | Indicates the municipality code unique code (provided by ISTAT or simple the Zip Code) | 
| region | Indicates the municipality's region. | 
| country | Indicates the municipality's country. | 
| zip_code | Indicates the municipality's zip code. |
| province | Indicates the municipality's province. | 

## Demo
You can test the service using my demo on this link: [dev.theappetize.com/php-it-zipcode-service](http://dev.theappetize.com/it-zipcode-service?zip_code=)

Made with :heart: for the community. 

I hope this project can help you too!
