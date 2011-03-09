import solr

s = solr.Solr('http://localhost:8080/solr/main')
s.delete_query("*:*", qt='standard')
s.commit()