/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

/**
 * Gets JSON data from API
 */
async function getJSONfromAPI() {
  const apiURL = '/api';
  const request = await fetch(apiURL, { method: 'GET' });
  const json = await request.json();
  return json;
}

export default getJSONfromAPI;
