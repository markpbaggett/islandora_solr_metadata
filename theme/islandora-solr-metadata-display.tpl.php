<?php
/**
 * @file
 * Islandora_solr_metadata display template.
 *
 * Variables available:
 * - $solr_fields: Array of results returned from Solr for the current object
 *   based upon defined display configuration(s). The array structure is:
 *   - display_label: The defined display label corresponding to the Solr field
 *     as defined in the configuration in translatable string form.
 *   - value: An array containing all the result(s) found for the specific field
 *     in Solr for the current object when queried against Solr.
 * - $found: Boolean indicating if a Solr doc was found for the current object.
 * - $not_found_message: A string to print if there was no document found in
 *   Solr.
 *
 * @see template_preprocess_islandora_solr_metadata_display()
 * @see template_process_islandora_solr_metadata_display()
 */
?>
<?php if ($found):
  if (!(empty($solr_fields) && variable_get('islandora_solr_metadata_omit_empty_values', FALSE))):?>
<fieldset <?php $print ? print('class="islandora islandora-metadata"') : print('class="islandora islandora-metadata collapsible collapsed"');?>>
  <legend><span class="fieldset-legend"><?php print t('Details'); ?></span></legend>
  <div class="fieldset-wrapper">
    <dl xmlns:dcterms="http://purl.org/dc/terms/" class="islandora-inline-metadata islandora-metadata-fields">
 <?php
	      dpm($solr_fields);
	      if(isset($solr_fields['mods_titleInfo_title_s']['value'])){
		      print "<dt class='first'>Title</dt><dd class='first'><p>" . $solr_fields['mods_titleInfo_title_s']['value'][0] . "</p></dd>";
	      }
	      if(isset($solr_fields['mods_identifier_local_s']['value'])){
		      print "<dt>Identifiers</dt><dd><p>" . $solr_fields['mods_identifier_local_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_name_creator_namePart_ms']['value'])){
		      print "<dt>Creator</dt><dd>";
		      foreach(array_combine($solr_fields['mods_name_creator_namePart_ms']['value'], $solr_fields['mods_name_role_roleTerm_text_ms']['value']) as $value => $nameRole){
				  print "<p>" . $value . " (" . $nameRole . ")</p>";
		      }
		      print "</dt>";
	      }
	      if(isset($solr_fields['mods_originInfo_dateCreated_s']['value'])){
		      print "<dt>Date of Creation</dt><dd><p>" . $solr_fields['mods_originInfo_dateCreated_s']['value'][0] . "</p></dd>";
	      }
	      if(isset($solr_fields['mods_originInfo_dateIssued_ms']['value'])){
		      print "<dt>Date of Publication</dt><dd><p>" . $solr_fields['mods_originInfo_dateIssued_ms']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_originInfo_publisher_s']['value'])){
		      print "<dt>Publisher</dt><dd><p>" . $solr_fields['mods_originInfo_publisher_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_originInfo_publisher_s']['value'])){
		      print "<dt>Publisher</dt><dd><p>" . $solr_fields['mods_originInfo_publisher_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_originInfo_place_placeTerm_text_s']['value'])){
		      print "<dt>Place of Origin</dt><dd><p>" . $solr_fields['mods_originInfo_place_placeTerm_text_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_physicalDescription_extent_s']['value'])){
		      print "<dt>Extent</dt><dd><p>" . $solr_fields['mods_physicalDescription_extent_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_abstract_ms']['value'])){
		      print "<dt>Abstract / Descriptive Note</dt><dd>";
		      foreach($solr_fields['mods_abstract_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_subject_authority_lcsh_topic_ms']['value'])){
		      print "<dt>Subject Topic (LCSH)</dt><dd>";
		      foreach($solr_fields['mods_subject_authority_lcsh_topic_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_subject_authority_dots_topic_ms']['value'])){
		      print "<dt>Subject Topic (DOTS)</dt><dd>";
		      foreach($solr_fields['mods_subject_authority_dots_topic_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_subject_name_namePart_ms']['value'])){
		      print "<dt>Subject Name</dt><dd>";
		      foreach($solr_fields['mods_subject_name_namePart_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_subject_geographic_ms']['value'])){
		      print "<dt>Subject Geographic</dt><dd>";
		      foreach(array_combine($solr_fields['mods_subject_geographic_ms']['value'], $solr_fields['mods_subject_cartographics_coordinates_ms']['value']) as $value => $cartographic){
				  print "<p>" . $value . " (" . $cartographic . ")</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_physicalDescription_form_s']['value'])){
		      print "<dt>Form</dt><dd><p>" . $solr_fields['mods_physicalDescription_form_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_genre_s']['value'])){
		      print "<dt>Genre</dt><dd><p>" . $solr_fields['mods_genre_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_language_languageTerm_code_s']['value'])){
		      print "<dt>Language of Resource</dt><dd><p>" . $solr_fields['mods_language_languageTerm_code_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_note_ms']['value'])){
		      print "<dt>Note</dt><dd>";
		      foreach($solr_fields['mods_note_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_accessCondition_ms']['value'])){
		      print "<dt>Rights</dt><dd>";
		      foreach($solr_fields['mods_accessCondition_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	      if (isset($solr_fields['mods_location_physicalLocation_s']['value'])){
		      print "<dt>Repository Information</dt><dd>";
		      print "<p><strong>Repository: </strong>" . $solr_fields['mods_location_physicalLocation_s']['value'][0] . "</p>";
		      print "<p><strong>Archival Collection: </strong>" . $solr_fields['mods_relatedItem_host_Collection_titleInfo_title_s']['value'][0] . "</p>";
		      print "<p><strong>Collection Identifier: </strong>" . $solr_fields['mods_relatedItem_host_Collection_identifier_local_s']['value'][0] . "</p>";
		      print "</dd>";
	      }
	      if (isset($solr_fields['mods_relatedItem_host_Project_titleInfo_title_s']['value'])){
		      print "<dt>Digital Collection</dt><dd><p>" . $solr_fields['mods_relatedItem_host_Project_titleInfo_title_s']['value'][0] . "</p>";
		      if (isset($solr_fields['mods_relatedItem_host_Project_titleInfo_title_s']['value'])){
			      print $solr_fields['mods_relatedItem_host_Project_location_url_s']['value'][0];
			  }
			  print "</dd>";
	      }
	      if (isset($solr_fields['mods_physicalDescription_internetMediaType_s']['value'])){
		      print "<dt>Internet Media Type</dt><dd><p>" . $solr_fields['mods_physicalDescription_internetMediaType_s']['value'][0] . "</p></dd>";
	      }
	      if (isset($solr_fields['mods_recordInfo_recordContentSource_ms']['value'])){
		      print "<dt>Record Source</dt><dd>";
		      foreach($solr_fields['mods_recordInfo_recordContentSource_ms']['value'] as $value){
				  print "<p>" . $value . "</p>";
		      }
		      print "</dt>";
	      }
	  	?>
    </dl>
  </div>
</fieldset>
<?php endif; ?>
<?php else: ?>
  <fieldset <?php $print ? print('class="islandora islandora-metadata"') : print('class="islandora islandora-metadata collapsible collapsed"');?>>
    <legend><span class="fieldset-legend"><?php print t('Details'); ?></span></legend>
    <?php //XXX: Hack in markup for message. ?>
    <div class="messages--warning messages warning">
      <?php print $not_found_message; ?>
    </div>
  </fieldset>
<?php endif; ?>
