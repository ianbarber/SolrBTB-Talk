import solr #using solrpy

# create a connection to a solr server
s = solr.Solr('http://localhost:8080/solr/main')

doc = dict(
    permalink = "http://fooweb.com/strategy/DCPO",
    category = "strategy",
    title = "DPCO: A Framework For Synergy",
    body = "DPCO, or Dynamic Performance Class Organisation is a ISO90210 quality oriented management process that aims to revolutionise industry with cross-functional dyanmic work structures designed to optimise synergy while still keeping 'people' at the heart of the process. ",
    author = "Sean Alison",
    date = "2011-03-01T00:00:00Z",
    source_site = "fooweb.com",
    )
s.add(doc)
doc = dict(
    permalink = "http://fooweb.com/strategy/IDIE",
    category = "strategy",
    title = "IDIE: The 802.11g Of Talent Management",
    body = "Inspiration-Direction-Influence-Effectiveness is the new way of improving staff retention, building employee morale, and developing effective, strategically and tactically aware team members,",
    author = "Sean Alison",
    date = "2011-02-28T00:00:00Z",
    source_site = "fooweb.com",
    )
s.add(doc)
doc = dict(
    permalink = "http://fooweb.com/technology/psbwhitepaper",
    category = "technology",
    title = "Whitepaper #7 - Preferential Selective Band Transmitters",
    body = "Using wideband signalling techniques and cross matrix frequency reduction we suggest a protocol for selective band reduction and L-eigenvalue simplification for preferred status quality filtering.",
    author = "Tom Bradbury",
    date = "2011-03-01T00:00:00Z",
    source_site = "fooweb.com",
    )
s.add(doc)
doc = dict(
    permalink = "http://fooweb.com/technology/idiemanager",
    category = "technology",
    title = "Overview of the IDIE manager",
    body = "To help with those implementing the IDIE technique, we now have a full hosted management application to track employee progress. For use by both the manager and the employee, IDIE offers the most flexible and powerful view available.",
    author = "Tom Bradbury",
    date = "2011-02-28T00:00:00Z",
    source_site = "fooweb.com",
    )
s.add(doc)
s.commit()
