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

@if ($type == 'arrow-left')
<svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow-left">
  <path d="M0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967L5.24264 0.696699C5.53553 0.403806 6.01041 0.403806 6.3033 0.696699C6.59619 0.989592 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.46967 6.53033ZM17 6.75H1V5.25H17V6.75Z" fill="black"/>
</svg>
@endif