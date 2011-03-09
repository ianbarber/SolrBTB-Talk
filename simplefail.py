from solr import *
url = 'http://localhost:8080/solr/main'
s = SolrConnection(url)

response = s.query('iso90210')
if(response.results.numFound == '0'):
    print "No results found!"
else:   
    for hit in response.results:
        print hit['title']
        print hit['body']
