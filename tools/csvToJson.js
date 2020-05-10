/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

const fs = require('fs');

function convertCSVToJSON(csv) {
  const data = {
    countries: [],
    genders: ['weiblich', 'männlich'],
    levels: ['Sekundarstufe I', 'Sekundarstufe II'],
    types: [
      'Fachmittelschulen',
      'Gymnasium',
      'Handelsmittelschulen',
      'Informatikmittelschulen',
      'Passerelle',
    ],
    years: {},
  };

  // Split csv into rows, ignore column names and last row which is empty
  const rows = csv.split('\r\n').slice(1, -2);

  // Loop through every row
  for (let i = 0; i < rows.length; i += 1) {
    const columns = rows[i].split(';');

    const year = columns[1];
    const level = columns[2];
    const type = columns[3];
    const gender = columns[4];
    const country = columns[5];
    const size = parseInt(columns[6], 10);

    // Check if year already exists, if not add new year to array
    if (!data.years.hasOwnProperty(year)) {
      data.years[year] = [];
    }

    // Check if country already exists, if not add new country to array
    if (data.countries.indexOf(country) <= -1) {
      data.countries.push(country);
    }

    data.years[year].push({
      level: data.levels.indexOf(level),
      type: data.types.indexOf(type),
      gender: data.genders.indexOf(gender),
      country: data.countries.indexOf(country),
      size,
    });
  }

  return data;
}

function main() {
  // TODO: Add error checking
  // Get csv target file and json output path
  const csvPath = process.argv[2];
  const jsonPath = process.argv[3];

  fs.readFile(csvPath, 'utf8', (err, data) => {
    const json = convertCSVToJSON(data);
    fs.writeFile(jsonPath, JSON.stringify(json), () => { });
  });
}

main();
