{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}



<?php $nocache_hash = \md5(time()); ?>
<script src="{{ asset('js/scripts.min.js') }}?v={{ $nocache_hash }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/jquery.responsImg.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/tabs.min.js') }}"></script>
<script src="{{ asset('js/jquery.date-dropdowns.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/sticky.min.js') }}"></script>
<script src="{{ asset('js/iframeResizer.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
@if (\App::getLocale() != 'en')
    <script src="{{ asset('js/jquery.validate.messages_' . \App::getLocale() . '.js') }}"></script>
@endif
<script src="{{ asset('js/validation.js') }}?v={{ $nocache_hash }}"></script>
<script src="{{ asset('js/depo.js') }}?v={{ $nocache_hash }}"></script>
<script src="{{ asset('js/common.js') }}?v={{ $nocache_hash }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150949391-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150949391-1');
</script>


<?php if( isset($_GET['deposite_done']) ){
	
	if( $_GET['deposite_done'] == '1' )
	{
		?>

			<script type="text/javascript"> invokeNotification(1,'SUCCESS','Congrats for successfully depositing money, Your updated balance would be reflected in balance section.'); </script>
		
<?php	}else if( $_GET['deposite_done'] == '0' ){ ?> 
	
		<script type="text/javascript"> invokeNotification(0,'SORRY','Sorry something went wrong. Please check you have put valid information and try again, Else Please contact to our support team.'); </script>
	
<?php  } } ?>

<?php
if( isset($_GET['type']) && isset($_GET['message']) )
{
	if( $_GET['type'] == 'alert-success' )
	{
		?>
	<script type="text/javascript"> invokeNotification(1,'SUCCESS','<?php echo $_GET["message"]; ?>'); </script>
	<?php
	}
	else
	{
		?>
		<script type="text/javascript"> invokeNotification(0,'SORRY','<?php echo $_GET["message"]; ?>'); </script>
		<?php
	}
}
 ?>