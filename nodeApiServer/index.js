var mysql = require('mysql');
const express = require('express')
var cors = require('cors')
const app = express();
const port = 9000;
const bodyParser = require('body-parser')
app.use(bodyParser.json()) // support json encoded bodies
app.use(bodyParser.urlencoded({ extended: true })) // support encoded bodies
const { Op } = require("sequelize");
const Office = require("./models/m_office")


app.use(cors())

app.post('/', (req, res) => {
	
	let queryObject = {attributes: ['name', 'offices', 'tables', 'sqm', 'price']};
	queryObject.where = {};
	
	if( req.body.params.address != null &  req.body.params.address !='' & typeof req.body.params.address !== "undefined" ){
	  queryObject.where.name = { [Op.like]: '%'+req.body.params.address+'%' };
	} 
	
	if( req.body.params.offices != null &  req.body.params.offices != '' & typeof req.body.params.offices !== "undefined" ){
	  queryObject.where.offices = { [Op.eq]: parseInt(req.body.params.offices) };
	}

	if( req.body.params.tables != null &  req.body.params.tables != '' & typeof req.body.params.tables !== "undefined" ){
	  queryObject.where.tables = { [Op.eq]: parseInt(req.body.params.tables) };
	}


	if( req.body.params.prices != null &  req.body.params.prices != '' & typeof req.body.params.prices !== "undefined" ){
	  
	 	if ( (req.body.params.prices).length == 1 )
		{
			console.log(req.body.params.prices[0]);
			queryObject.where.price = { [Op.gte] : req.body.params.prices[0] };
		}


		if ( (req.body.params.prices).length == 2 )
		{
			console.log(req.body.params.prices[0]);
			console.log(req.body.params.prices[1]);
			queryObject.where.price = { [Op.between] : [req.body.params.prices[0] , req.body.params.prices[1] ] };
		}

	  
	}

	if( req.body.params.sqms != null &  req.body.params.sqms != '' & typeof req.body.params.sqms !== "undefined" ){
	  
		if ( (req.body.params.sqms).length == 1 )
		{
			console.log(req.body.params.sqms[0]);
			queryObject.where.sqm = { [Op.gte] : req.body.params.sqms[0] };
		}


		if ( (req.body.params.sqms).length == 2 )
		{
			console.log(req.body.params.sqms[0]);
			console.log(req.body.params.sqms[1]);
			queryObject.where.sqm = { [Op.between] : [req.body.params.sqms[0] , req.body.params.sqms[1] ] };
		}
	  
	}

	Office.findAll( queryObject )
	.then( dataset => {
		res.send(dataset);		
	})
	.catch(err => {
		console.log(err);
		res.send({error : err});	
	});
});


app.listen(port, () => {
  	console.log("listening on port 9000");
});