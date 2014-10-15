@local @local_vlacsdatagenerator
Feature: Manage assessment
  In order to enable an assessment
  As an administrator
  I need to go to the assessment manager block and use the edit assessment feature.

  @javascript
  Scenario: Enable assessment
    Given I load the vla test data
    And I log in as "admin"
    And I click on "AP Microeconomics v9_gs-Teacher-1" "link"
    And I click on "Edit assessments" "link"
    And I switch to "editassessments" window
#    And I should not see "???"
    And I click on "An offline assignment" "link"
    When I set the field "Is enabled?" to "1"
    And I press "Save changes"
#    Then I should see "???"
