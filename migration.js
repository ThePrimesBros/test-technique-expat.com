const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    port: 3306,
    user: 'test',
    password: 'test',
    database: 'expat_test',
  });

connection.connect();

const migrationQueries = [
    'CREATE TABLE IF NOT EXISTS articles (id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(80) NOT NULL, content TEXT NOT NULL)',
    'CREATE TABLE IF NOT EXISTS category (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(80) NOT NULL, description VARCHAR(255) NOT NULL)',
    'CREATE TABLE IF NOT EXISTS article_has_category (article_id INT NOT NULL, category_id INT NOT NULL, FOREIGN KEY (article_id) REFERENCES articles (id), FOREIGN KEY (category_id) REFERENCES category (id))',
  ];

migrationQueries.forEach(query => {
  connection.query(query, (error, results) => {
    if (error) throw error;
    console.log('Migration query executed successfully:', query);
  });
});

connection.end();