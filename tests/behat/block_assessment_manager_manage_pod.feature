@local @local_vlacsdatagenerator
Feature: Manage assessment pods
  In order to change a segment assessment pod's percent credit from 50 to 100
  As an administrator
  I need to go to the assessment manager block and use the edit feature.

  @javascript
  Scenario: Edit assessment pod
    Given I load the vla test data
    And I log in as "admin"
    And I click on "AP Microeconomics v9_gs-Teacher-1" "link"
    And I click on "Edit pods" "link"
    And I switch to "editpods" window
    And I should not see "100.00"
    And I click on "Segment 1" "link"
    When I set the field "Percent Credit" to "100"
    And I press "Save changes"
    Then I should see "100.00"
