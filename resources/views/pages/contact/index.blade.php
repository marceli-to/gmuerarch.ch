@extends('layout.web')
@section('seo_title', __('Kontakt'))
@section('seo_description', '')
@section('content')
<section class="content content-grid content-grid--1:1">
  <div class="content-grid__item sm:pt-12x">
    <article class="content">
      <p>
        Silvia Gmür Reto Gmür Architekten<br>
        Pfluggässlein 3<br>
        CH-4001 Basel<br>
        Telefon 061 261 24 62<br>
        <a href="mailto:mail@gmuerarch.ch" title="{{ __('E-Mail') }}">mail@gmuerarch.ch</a><br>
        <a href="https://www.gmuerarch.ch" title="{{ __('Webseite') }}">www.gmuerarch.ch</a>
      </p>
    </article>
  </div>
  <div class="content-grid__item map" id="map"></div>
</section>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibWFyY2VsaXRvb29vIiwiYSI6ImNrMHNsdmhwdjAzcjIzZ3BldTlqdWhnaWEifQ.EWZE383Tn4xBt0E5pSXh6Q';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/marcelitoooo/ck55dr00808kn1cnxip8mz459',
    center: [7.589448398659148,47.55619108998608], 
    zoom: 15
});
map.addControl(new mapboxgl.NavigationControl());
map.scrollZoom.disable();

var geojson = {
  type: 'FeatureCollection',
  features: [{
    type: 'Feature',
    geometry: {
      type: 'Point',
      coordinates: [7.589387843808185,47.5559782917443],
    },
    properties: {
      title: 'Silvia Gmür Reto Gmür Architekten',
      description: 'Basel'
    }
  }]
};

// add markers to map
geojson.features.forEach(function(marker) {

// create a HTML element for each feature
var el = document.createElement('div');
el.className = 'marker';

// make a marker for each feature and add to the map
new mapboxgl.Marker(el)
  .setLngLat(marker.geometry.coordinates)
  .addTo(map);
});
</script>
@endsection