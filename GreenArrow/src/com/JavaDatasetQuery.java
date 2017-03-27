package com;
import java.io.File;
import java.nio.file.Path;
import java.nio.file.Paths;

import org.apache.spark.sql.Dataset;
import org.apache.spark.sql.Row;
import org.apache.spark.sql.SparkSession;
import org.apache.spark.sql.types.StructType;

public class JavaDatasetQuery {

	public static void main(String[] args) {
		SparkSession spark = SparkSession
			      .builder()
			      .appName("JavaDatasetQuery")
			      .getOrCreate();
		
		// Create DataFrame representing the stream of input lines from /dataset/Chicago.json
		StructType userSchema = new StructType().add("longitude", "Double").add("latitude", "Double");
		Dataset<Row> jsonDF = spark
				.readStream()
				.format("json")
				.schema(userSchema)
				.json(getCurrentPackagePath() + "/dataset/Chicago.json");
				
	}
	
	private static String getCurrentPackagePath() {
		Path currentAbsolutePath = Paths.get(".").toAbsolutePath().normalize();
		File file = new File(JavaDatasetQuery.class.getPackage().getName());
		StringBuilder packageSB = new StringBuilder();
		packageSB.append(currentAbsolutePath + "/src/");
		for (String dir : file.getName().split("\\.")) packageSB.append(dir + "/");
		return packageSB.toString();
	}

}
