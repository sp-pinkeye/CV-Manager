<!-- resources/views/address/show.blade.php -->
@if( $address->address1 ){!! $address->address1 !!}<br />@endif
@if( $address->address2 ){!! $address->address2 !!}<br />@endif
@if( $address->address3 ){!! $address->address3 !!}<br />@endif
@if( $address->city ){!! $address->city !!}<br />@endif
@if( $address->state ){!! $address->state !!}<br />@endif
@if( $address->postcode ){!! $address->postcode !!}<br />@endif
@if( $address->country ){!! $address->country !!}<br/>@endif