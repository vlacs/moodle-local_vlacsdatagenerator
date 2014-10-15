@local @local_vlacsdatagenerator
Feature: Manage assessment standards
  In order to add a new Common Core standard
  As an administrator (Competency Editor)
  I need to go to the assessment manager block and use the edit standard feature.

  @javascript
  Scenario: Add a new standard
    Given I load the vla test data
    And I log in as "admin"
    And I click on "AP Microeconomics v9_gs-Teacher-1" "link"
    And I click on "Edit standards" "link"
    And I switch to "editstandards" window
    And I should not see "Common Core standard"
    And I click on "Add a new standard" "link"
    And I set the field "Name" to "Common Core standard"
    And I set the field "CC (Common Core)" to "1"
    And I set the field "Description" to "Common Core standard description"
    When I press "Save standard"
    And I click on "Continue" "link"
    Then I should see "Common Core standard description"
