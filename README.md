# ATLS-5214-BigDataArchitecture
## Team: IceStream
[Team Link](https://docs.google.com/spreadsheets/d/1Gv0jFhpdrLyGMqTjAnCv5wOGW3jQOCt-bI6XhQpgD9I/edit)
## Project Description
This project aims at using Big Data technologies to build an interactive website displaying crime map. Users would be able to see crime data in a specific city. A crime dataset from government is used. Tech stack will be shown below.

## Team members:
Name | Github Account | Email | Grad/Undergrad
--- | --- | --- | ---
Bryan Bo Cao (Leader) |	BryanBo-Cao	| bo.cao-1@colorado.edu | CS Grad
Chih-Wei Lin | chihweil5 | Chih.W.Lin@colorado.edu | CS Grad
Peilun Zhang | pezhin	| peilun.zhang@colorado.edu | CS Undergrad																	
Yan Li | YanLi26 | yali2241@colorado.edu| CS Grad
Yi-Chen Kuo |	emiliemili0208 | yiku2564@colorado.edu | CS Grad

## Data Set:
https://www.data.gov/
Los Angeles(2012-2015) https://catalog.data.gov/dataset/crimes-2012-2015
Rockford (2011-2016) https://catalog.data.gov/dataset/city-of-rockford-crime-offenses-2016-ytd
Austin(2014) https://catalog.data.gov/dataset/annual-crime-2014
Chicago(2001-2016) https://catalog.data.gov/dataset/crimes-2001-to-present-398a4

## Tech Stack:
GOVERNANCE INTEGRATION | TOOLS | SECURITY | OPERATIONS
--- | --- | --- | ---
`Project Code Management` | Zepplein | `Administration` | `Provisioning, Managing & Monitoring`
Pivotal | Ambari User Views | `Authentication` | Ambari
Github | `DATA ACCESS` | `Authorization` | Cloudbreak
`Data Lifecycle & Governance` | Batch : MapReduce | `Auditing` | ZooKeeper
Falcon | Script : Pig | `Data Protection` | `Scheduling`
Atlas | Sql : Hive | Ranger | Oozie
`Data Workflow` | NoSql : Cassandra, HBase, Accumulo, Phoenix | Knox |
Sqoop | Stream : Storm | Atlas |
Flume | Search : Solr | HDFS Encryption |
Kafka | In-Mem : Spark |
NFS | ISV Enginer : Partners |
WebHDFS | YARN : Data Operating System |

## APIs:
Google Maps
https://blog.gtwang.org/programming/getting-started-google-maps-javascript-api/
## d3js d3-geo
Map rendering tutorial
https://medium.com/@mbostock/command-line-cartography-part-1-897aa8f8ca2c#.5z0b5lpbo
https://medium.com/@dschnr/using-clustering-to-create-a-new-d3-js-color-scale-dec4ccd639d2#.mykpwd1cj
https://medium.com/@mbostock/introducing-d3-scale-61980c51545f#.l0eun9u85
