const { Sequelize, DataTypes } = require('sequelize');
const sequelize  = new Sequelize('hatchet_db', 'root', null , {
  host: 'localhost',
  dialect: 'mysql'
});


const Office = sequelize.define('m_office', {
  id: {
    autoIncrement: true,
    type: DataTypes.BIGINT.UNSIGNED,
    allowNull: false,
    primaryKey: true
  },
  name: {
    type: DataTypes.STRING(255),
    allowNull: false
  },
  price: {
    type: DataTypes.INTEGER,
    allowNull: false
  },
  offices: {
    type: DataTypes.INTEGER,
    allowNull: false
  },
  tables: {
    type: DataTypes.INTEGER,
    allowNull: false
  },
  sqm: {
    type: DataTypes.INTEGER,
    allowNull: false
  },
  created_at: {
    type: DataTypes.DATE,
    allowNull: true
  },
  updated_at: {
    type: DataTypes.DATE,
    allowNull: true
  }
}, {
  sequelize,
  tableName: 'm_office',
  timestamps: false,
  indexes: [
    {
      name: "PRIMARY",
      unique: true,
      using: "BTREE",
      fields: [
        { name: "id" },
      ]
    },
  ]
});

module.exports = Office;