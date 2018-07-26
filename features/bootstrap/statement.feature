Feature: Types feature
  Scenario: Add type
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/statements" with body:
    """
    {
      "date": "2018-07-26T22:28:13.816Z",
      "designation": "Nom de domaine",
      "inflow": 0,
      "outflow": 8
    }
    """
    Then the response status code should be 201
    And the response should be in JSON

  Scenario: Update type
    When I add "Content-Type" header equal to "application/json"
    And I send a "PUT" request to "/api/statements/1" with body:
    """
    {
        "designation": "vps sans ndd"
    }
    """
    Then the response status code should be 200


  Scenario: Get informations of user
    When I send a "GET" request to "/api/statements/1"
    Then the response status code should be 200

  Scenario: delete user jenaye
    When I add "Content-Type" header equal to "application/json"
    And I send a "DELETE" request to "/api/statements/1"
    Then the response status code should be 200
