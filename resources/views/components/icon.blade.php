@if ($type == 'burger')
<div class="menu-icon menu-icon--burger">
  <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="burger">
    <rect width="16" height="1" fill="black"/>
    <rect y="5" width="16" height="1" fill="black"/>
    <rect y="10" width="16" height="1" fill="black"/>
  </svg>
</div>
@endif
@if ($type == 'cross')
<div class="menu-icon menu-icon--cross">
  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg" class="cross">
    <rect y="11.8995" width="16" height="1" transform="rotate(-45 0 11.8995)" fill="#C84027"/>
    <rect x="0.707108" y="0.585785" width="16" height="1" transform="rotate(45 0.707108 0.585785)" fill="#C84027"/>
  </svg>
</div>
@endif

@if ($type == 'arrow-prev')
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.3 16.6">
  <path fill="currentColor" d="M9.3 1l-1-1L0 8.3l8.3 8.3 1-1-6.6-6.5h23.6V7.6H2.7L9.3 1z"/>
</svg>
@endif

@if ($type == 'arrow-next')
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.3 16.6">
  <path fill="currrentColor" d="M18 0l-1 1 6.6 6.6H0v1.5h23.6L17 15.6l1 1 8.3-8.3L18 0z"/>
</svg>
@endif