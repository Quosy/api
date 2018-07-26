Feature: Types feature
  Scenario: Add type
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/members" with body:
    """
    {
       "lastname": "Jean",
       "firstname": "claude",
       "attestation": true,
       "membership": "toto",
       "email": "jenaye@protonmail.com",
       "cheque": true,
       "phone": "0660708090",
       "enabled": true
    }
    """
    Then the response status code should be 201
    And the response should be in JSON

  Scenario: Update jean member
    When I add "Content-Type" header equal to "application/json"
    And I send a "PUT" request to "/api/members/1" with body:
    """
    {
         "enabled": false
    }
    """
    Then the response status code should be 200


  Scenario: Get informations of member jean
    When I send a "GET" request to "/api/members/1"
    Then the response status code should be 200

  Scenario: delete member Jean
    When I add "Content-Type" header equal to "application/json"
    And I send a "DELETE" request to "/api/members/1"
    Then the response status code should be 200
