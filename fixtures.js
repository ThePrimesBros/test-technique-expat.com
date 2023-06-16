const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    port: 3306,
    user: 'test',
    password: 'test',
    database: 'expat_test',
  });

connection.connect();

// SQL statements for adding fixtures
const fixturesQueries = [
  "INSERT INTO category (name, description) VALUES ('Voyage', 'Parle de voyage')",
  "INSERT INTO category (name, description) VALUES ('Informatique', 'Parle de IT')",
];

fixturesQueries.forEach(query => {
  connection.query(query, (error, results) => {
    if (error) throw error;
    console.log('Fixture query executed successfully:', query);
  });
});

connection.end();
