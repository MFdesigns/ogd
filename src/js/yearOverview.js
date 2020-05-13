/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

/* eslint-disable import/extensions */
/* eslint-disable import/no-useless-path-segments */
import Chart from '../js/Chart.esm.js';

// Global app state
const app = {
  data: {}, // JSON data from the API
  charts: [], // Reference to all charts
};

/**
 * Gets JSON data from API
 */
async function getJSONfromAPI() {
  const request = await fetch('/api.php', { method: 'GET' });
  const json = await request.json();
  return json;
}

// Get API data and create all charts with default year on page load
document.addEventListener('DOMContentLoaded', async () => {
  // Get JSON from API and add it to global app data
  app.data = await getJSONfromAPI();

  // Create charts and add reference to global charts array
  // app.charts.gender = createGenderChart(year);
});
