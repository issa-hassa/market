
/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
/**
// Initialize and add the map
let map: any;
async function initMap(): Promise<void> {
  // The location of AM
  const position = { lat: 48.10389, lng: 1.67715 };

  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps") as google.maps.MapsLibrary;
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker") as google.maps.MarkerLibrary;

  // The map, centered at AM
  map = new Map(
    document.getElementById('map') as HTMLElement,
    {
      zoom: 7,
      center: position,
      mapId: 'DEMO_MAP_ID',
    }
  );

  // The marker, positioned at AM
  const marker = new AdvancedMarkerElement({
    map: map,
    position: position,
    title: 'AM'
  });
}

initMap();

export { };
 */