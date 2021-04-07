var DataTypes = require("sequelize").DataTypes;
var _failed_jobs = require("./failed_jobs");
var _m_office = require("./m_office");
var _migrations = require("./migrations");
var _password_resets = require("./password_resets");
var _personal_access_tokens = require("./personal_access_tokens");
var _sessions = require("./sessions");
var _users = require("./users");

function initModels(sequelize) {
  var failed_jobs = _failed_jobs(sequelize, DataTypes);
  var m_office = _m_office(sequelize, DataTypes);
  var migrations = _migrations(sequelize, DataTypes);
  var password_resets = _password_resets(sequelize, DataTypes);
  var personal_access_tokens = _personal_access_tokens(sequelize, DataTypes);
  var sessions = _sessions(sequelize, DataTypes);
  var users = _users(sequelize, DataTypes);


  return {
    failed_jobs,
    m_office,
    migrations,
    password_resets,
    personal_access_tokens,
    sessions,
    users,
  };
}
module.exports = initModels;
module.exports.initModels = initModels;
module.exports.default = initModels;
