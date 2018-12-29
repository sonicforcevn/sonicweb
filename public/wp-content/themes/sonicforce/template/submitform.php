<?php 
/* Template Name: Submit Form */
$pageid = get_the_ID();
get_header();
the_post();
?>
<form action="<?php if(get_field('contact_url_action','option')) echo get_field('contact_url_action','option'); else echo 'https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8'; ?>" id="contactForm"  method="POST">
  <div class="form-box">
	 <input type=hidden name="oid" id="oid" value="<?php if(get_field('contact_oid','option')) echo get_field('contact_oid','option'); else echo '00D0l0000008z6r'; ?>">
	 <input type=hidden name="retURL" id="retURL" value="<?php if(get_field('contact_retURL','option')) echo get_field('contact_retURL','option'); else echo 'http://salesforce.com'; ?>">
	 <input type=hidden name="salutation" id="salutation" value="<?php if(get_field('salutation','option')) echo get_field('salutation','option'); else echo 'None'; ?>">
	 <div class="form-group">
		<label for="first_name">First Name</label>
		<input  id="first_name" maxlength="40" name="first_name" size="20" type="text" value="<?php echo $_GET['first_name']; ?>" placeholder="First Name (Required)" /><br>
	 </div>
	 <div class="form-group">
		<label for="last_name">Last Name</label>
		<input  id="last_name" maxlength="80" name="last_name" size="20" type="text" value="<?php echo $_GET['last_name']; ?>" placeholder="Last Name (Required)" /><br>
	 </div>
	 <div class="form-group">
		<!-- Job Title: --><input  id="00N0l000002YOow" maxlength="255" name="00N0l000002YOow" value="<?php echo $_GET['job_title']; ?>" size="20" type="text" placeholder="Job Title" /><br>
	 </div>
	 <div class="form-group">
		<label for="mobile">Phone</label>
		<input  id="mobile" maxlength="40" name="mobile" size="20" type="text" value="<?php echo $_GET['mobile']; ?>" placeholder="Phone (Required)" /><br>
	 </div>
	 <div class="form-group">
		<label for="email">Email</label>
		<input  id="email" maxlength="80" name="email" size="20" type="text" value="<?php echo $_GET['email']; ?>" placeholder="Email (Required)" /><br>
	 </div>
	 <div class="form-group">
		<label for="company">Company</label>
		<input  id="company" maxlength="40" name="company" size="20" type="text" value="<?php echo $_GET['company']; ?>" placeholder="Company (Required)" /><br>
	 </div>
	 <div class="form-group">
		<label for="URL">Website</label>
		<input  id="URL" maxlength="80" name="URL" size="20" type="text" value="<?php echo $_GET['URL']; ?>"  placeholder="Website" /><br>
	 </div>
	 <div class="form-group">
		<label for="city">City</label>
		<input  id="city" maxlength="40" name="city" size="20" type="text" value="<?php echo $_GET['city']; ?>" placeholder="City" /><br>
	 </div>
	 <div class="form-group">
		<label for="country">Country</label>
		<input  id="country" maxlength="40" name="country" size="20" type="text" value="<?php echo $_GET['country']; ?>" placeholder="Country (Required)" /><br>
	 </div>
	 <div class="form-group">
		<!-- Interesting:  --> 
		 <select  id="00N0l000002YdnE" name="00N0l000002YdnE" title="Interesting">
			<option value="">--Interested In-- (Required)</option>
			<option value="Salesforce Implementation and Consulting" selected>Salesforce Implementation and Consulting</option>
			<option value="Salesforce Implementation for Non Profit">Salesforce Implementation for Non Profit</option>
			<option value="Salesforce Implementation (Sales Cloud, Service Cloud)">Salesforce Implementation (Sales Cloud, Service Cloud)</option>
			<option value="Salesforce Implementation (Community Cloud)">Salesforce Implementation (Community Cloud)</option>
			<option value="Marketing Automation Solution (Marketing Cloud, Pardot, Email / SMS Marketing)">Marketing Automation Solution (Marketing Cloud, Pardot, Email / SMS Marketing)</option>
			<option value="Salesforce Development - Lightning Component">Salesforce Development - Lightning Component</option>
			<option value="Salesforce Development and Integration (ERP, Third Party Solutions..etc)">Salesforce Development and Integration (ERP, Third Party Solutions..etc)</option>
			<option value="ERP Implementation & Customizing (Built in Salesforce)">ERP Implementation & Customizing (Built in Salesforce)</option>
			<option value="Mobile App Developement">Mobile App Developement</option>
			<option value="Custom Salesforce Solutions for Education">Custom Salesforce Solutions for Education</option>
			<option value="Custom Salesforce Solutions for Real Estate">Custom Salesforce Solutions for Real Estate</option>
			<option value="Custom Salesforce Solutions for Retail">Custom Salesforce Solutions for Retail</option>
			<option value="Website Development">Website Development</option>
			<option value="UI / UX Design">UI / UX Design</option>
			<option value="Digital Marketing - SEO Services">Digital Marketing - SEO Services</option>
			<option value="Digital Marketing - Social (Fanpage & Forum Seeding)">Digital Marketing - Social (Fanpage & Forum Seeding)</option>
			<option value="Digital Marketing - Content Services (Audit, Article Writing, PR)">Digital Marketing - Content Services (Audit, Article Writing, PR)</option>
			<option value="Digital Marketing - Online Advertising (Adword, Facebook Ad)">Digital Marketing - Online Advertising (Adword, Facebook Ad)</option>
			<option value="Others">Others</option>
		</select><br>
	</div>
	 <div class="form-group">
		 <!-- Inquiry Description: -->
		 <textarea  id="00N0l000002YOpB" name="00N0l000002YOpB"  value="<?php echo $_GET['comment']; ?>" type="text" wrap="soft" placeholder="Inquiry / Message "><?php echo $_GET['comment']; ?></textarea><br>
	 </div>
	 <div class="bottom-group">
		<div class="form-group">
			<input type="submit" id="actionSubmit" name="submit" value="submit">
			<div class="loadingjax"><div class="lds-css ng-scope"><div class="lds-spinner" style="100%;height:100%"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>
		</div>
	 </div>
	 <div class="alert alert-success message-alertform" role="alert">Send contact successfully!</div>
  </div>
</form>
<?php get_footer(); ?>
<script type="text/javascript">	
jQuery(function($) {
	$('#actionSubmit').click();
});
</script>