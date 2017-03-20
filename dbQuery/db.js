function queryDB(num){

	var mongojs = require('mongojs')

	var db = mongojs('mongodb://<db name>:<db password>@<db address>')
	var mycollection = db.collection('<collection name>')

	db.on('error', function (err) {
	    console.log('database error', err)
	})

	db.on('connect', function () {
	    console.log('database connected')
	})

	// find position
	var query = { Latitude: 1, Longtitude: 1, Date: 1, CrimeType: 1}
	mycollection.find({}, query).limit(num).skip(0, function (err, docs) { 
		console.log(docs)
		db.close()
		return docs
		
	})
}