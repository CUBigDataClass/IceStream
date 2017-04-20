Download kafka from https://kafka.apache.org/documentation/
Open a terminal
```
> tar -xzf kafka_2.11-0.10.2.0.tgz
> cd kafka_2.11-0.10.2.0
```

cd to the kafka directory
```
➜  ~ cd Documents/kafka_2.11-0.10.2.0
➜  kafka_2.11-0.10.2.0 pwd
/Users/GundamOO/Documents/kafka_2.11-0.10.2.0
```

start the zookeeper server
```
bin/zookeeper-server-start.sh config/zookeeper.properties
```

start the kafka server
```
bin/kafka-server-start.sh config/server.properties
```

create a topic "crimelocations"
```
bin/kafka-topics.sh --create --zookeeper localhost:2181 --replication-factor 1 --partitions 3 --topic crimelocations
```

see the topic

```
➜  kafka_2.11-0.10.2.0 bin/kafka-topics.sh --list --zookeeper localhost:2181
crimelocations
➜  kafka_2.11-0.10.2.0
```

