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

Start the zookeeper server
```
bin/zookeeper-server-start.sh config/zookeeper.properties
```

Start the kafka server
```
bin/kafka-server-start.sh config/server.properties
```

Create a topic "crimelocations"
```
bin/kafka-topics.sh --create --zookeeper localhost:2181 --replication-factor 1 --partitions 3 --topic crimelocations
```

See the topic

```
➜  kafka_2.11-0.10.2.0 bin/kafka-topics.sh --list --zookeeper localhost:2181
crimelocations
➜  kafka_2.11-0.10.2.0
```

Delete all the log files
```
rm -r /tmp/kafka-logs
```

See the messages from the topic "crimelocations"

```
➜  kafka_2.11-0.10.2.0 bin/kafka-console-consumer.sh --bootstrap-server localhost:9092 --topic crimelocations --from-beginning
```

