from solr import *
url = 'http://localhost:8080/solr/main'
s = SolrConnection(url)

response = s.query('idie')
for hit in response.results:
    print hit['title']
    print hit['body']
