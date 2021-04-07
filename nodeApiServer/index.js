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

	//console.log("req.body : " + req.body.price);
	
	let queryObject = {};
	queryObject.where = {};
	
	if( req.body.name != null &  req.body.name !='' & typeof req.body.name !== "undefined" ){
	  queryObject.where.name = { [Op.like]: '%'+req.body.name+'%' };
	} 
	
	if( req.body.price != null &  req.body.price != '' & typeof req.body.price !== "undefined" ){
	  queryObject.where.price = { [Op.eq]: parseInt(req.body.price) };
	}

	if( req.body.offices != null &  req.body.offices != '' & typeof req.body.offices !== "undefined" ){
	  queryObject.where.offices = { [Op.eq]: parseInt(req.body.offices) };
	}

	if( req.body.tables != null &  req.body.tables != '' & typeof req.body.tables !== "undefined" ){
	  queryObject.where.tables = { [Op.eq]: parseInt(req.body.tables) };
	}

	if( req.body.sqm != null &  req.body.sqm != '' & typeof req.body.sqm !== "undefined" ){
	  queryObject.where.sqm = { [Op.eq]: parseInt(req.body.sqm) };
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