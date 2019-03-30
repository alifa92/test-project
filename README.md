# test-project

## API calls


**Get project list**
```
METHOD: GET
URL: https://negotiable-rejectio.000webhostapp.com/api/get_project_data?apiKey={API_KEY}
```

**Get form data**
```
METHOD: GET
URL: https://negotiable-rejectio.000webhostapp.com/api/get_forms?apiKey={API_KEY}
```

**Get profile data**
```
METHOD: GET
URL: https://negotiable-rejectio.000webhostapp.com/api/get_profiles?apiKey={API_KEY}
```

**Get profile data**
```
METHOD: GET
URL: https://negotiable-rejectio.000webhostapp.com/api/get_profiles?apiKey={API_KEY}
```

**Get project form data**
```
METHOD: GET
URL: https://negotiable-rejectio.000webhostapp.com/api/get_project_form_data?apiKey={API_KEY}&project_id={PROJECT_ID}
```

**Get project profile data**
```
METHOD: GET
URL: https://negotiable-rejectio.000webhostapp.com/api/get_project_profile_data?apiKey={API_KEY}&project_id={PROJECT_ID}
```

**Create project**
```
METHOD: POST
URL: https://negotiable-rejectio.000webhostapp.com/api/create_projects

PARAMS:
apiKey
data = [{"name":"Test School", "description":"Lorem ...", "profile":["1","3"], "forms":["1","2"]},.....]
```
