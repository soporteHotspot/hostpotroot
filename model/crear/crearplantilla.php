	
<?php


//$sever="localhost";
//$user="root";
//$password="";
//$database="mikrotik";
//$port="3306";
 
 

 $htmlinicio='PGh0bWw+DQo8aGVhZD4NCgk8bWV0YSBjaGFyc2V0PSJ1dGYtOCI+DQoJPG1ldGEgbmFtZT0idmlld3BvcnQiIGNvbnRlbnQ9IndpZHRoPWRldmljZS13aWR0aCwgaW5pdGlhbC1zY2FsZT0xIj4NCgk8dGl0bGU+Y2FyZDwvdGl0bGU+DQo8L2hlYWQ+DQo8Ym9keT4NCg==';

 $htmlinicio=base64_decode($htmlinicio);



$phplogo='PD9waHANCg0KIA0KIGZ1bmN0aW9uIGNvbnZlcnR0aW1lKCRkYXRlKXsNCg0KaWYoJGRhdGU9PSIydzFkIil7JGRhdGU9IjE1LURJQVMiO31pZigkZGF0ZT09IjR3MmQiKXskZGF0ZT0iMS1NRVMiOyB9DQokbWlrcm90aWsgPSBhcnJheSgncycsICdtJywgJzFoJywnaCcsICcxZCcsICdkJywgJzF3JywgJ3cnKTsNCiRlc3AgPSBhcnJheSgnLVNlZy4nLCAnLU1pbnV0b3MgJywgJyAxLUhvcmEgJywgJy1Ib3JhcyAnLCAnMS1Ew61hICcsICctRMOtYXMgJywgJzEtU2VtYW5hICcsICctU2VtYW5hcyAnKTsNCnJldHVybiBzcHJpbnRmKHN0cl9yZXBsYWNlKCRtaWtyb3RpaywgJGVzcCwgJGRhdGUpKTsNCn0gDQoNCmlmIChpc3NldCgkX1BPU1RbJ29wY2lvbiddKSl7DQogIA0KcmVxdWlyZSgiLi4vcmVxdWlyZS9jb25uZWN0X2RiLnBocCIpOw0KDQokY29uc3VsdD0oIlNFTEVDVCAqIEZST00gc2lzdGVtYSB3aGVyZSAgaWQ9JzEnIik7DQokbD1teXNxbGlfcXVlcnkoJG15c3FsaSwkY29uc3VsdCk7DQokcD1teXNxbGlfZmV0Y2hfYXJyYXkoJGwpOyAgICAgICAgICAgDQokbG9nbz0nLi4vJy4kcFsnbG9nbyddOyANCiRpZHVzZXI9JHBbJ2lkdXN1YXJpbyddOyAgDQokaWRwYXNzPSRwWydpZHBhc3N3b3JkJ107IA0KJHRleHQ9JHBbJ3RleHRvJ107DQoNCg0KcmVxdWlyZSgiLi4vcmVxdWlyZS9jb25uZWN0X2RiLnBocCIpOw0KcmVxdWlyZV9vbmNlICcuLi9yZXF1aXJlL3JvdXRlcmJvYXJkLnBoYXInOw0KDQogICAgICAgDQogICAgICAgICAgICAgICRvYnRlbmVyZGE9KCJTRUxFQ1QgKiBGUk9NIHNpc3RlbWEiKTsNCiAgICAgICAgICAgICAgJGRhdGF4PW15c3FsaV9xdWVyeSgkbXlzcWxpLCRvYnRlbmVyZGEpOyAgICANCiAgICAgICAgICAgICAgJGRhdGE9bXlzcWxpX2ZldGNoX2FycmF5KCRkYXRheCk7IA0KICAgICAgICAgICAgICAkbW9uZWRhPSRkYXRhWydtb25lZGEnXTsNCg0KDQokdXN1YXJpbz0kX1NFU1NJT05bInVzZXJuYW1lIl07DQoNCiAgICRvYnRlbmVyaWRzdT0oIlNFTEVDVCAqIEZST00gcm91dGVyYm9hcmQgV0hFUkUgdXN1YXJpbz0nJHVzdWFyaW8nIik7DQogICAgICAgICAgICAgICRkYXRhc3VjdXJzYWw9bXlzcWxpX3F1ZXJ5KCRteXNxbGksJG9idGVuZXJpZHN1KTsgICAgDQogICAgICAgICAgICAgICRkYXRhcz1teXNxbGlfZmV0Y2hfYXJyYXkoJGRhdGFzdWN1cnNhbCk7ICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAkaWRzdWN1cnNhbD0kZGF0YXNbJ2lkc3VjdXJzYWwnXTsNCg0KICAgICAgICAgICAgICRvYnRlbmVyaWRzdWN1cnNhbD0oIlNFTEVDVCAqIEZST00gc3VjdXJzYWwgV0hFUkUgaWQ9JyRpZHN1Y3Vyc2FsJyIpOw0KICAgICAgICAgICAgICAkZGF0YXN1Y3Vyc2FsPW15c3FsaV9xdWVyeSgkbXlzcWxpLCRvYnRlbmVyaWRzdWN1cnNhbCk7ICAgIA0KICAgICAgICAgICAgICAkZGF0YXNzPW15c3FsaV9mZXRjaF9hcnJheSgkZGF0YXN1Y3Vyc2FsKTsgICAgICAgICAgICAgDQogICAgICAgICAgICAgICR0ZXh0b3M9JGRhdGFzc1sndGV4dG8nXSAgOyANCiAgDQpyZXF1aXJlX29uY2UgJy4uL3JlcXVpcmUvcm91dGVyYm9hcmRQREYucGhhcic7DQokdGlwbz0kX1BPU1RbJ29wY2lvbiddOyANCiRwYXIyPSRfUE9TVFsncGFyYW1ldHJvJ107IA0KJHBhciA9IHN0cl9yZXBsYWNlKCdgJywgJyInLCAkcGFyMik7DQoNCmlmICgkQVBJLT5jb25uZWN0KCRpcCwkVXN1YXJpbywkcGFzc3dvcmQsJHB1ZXJ0bykpIHsNCg0KDQokb2J0ZW5lcnZpZz0gJEFQSS0+Y29tbSgiL3N5c3RlbS9zY2hlZHVsZS9wcmludCIsIGFycmF5KA0KICAgICAgICAgICAgIi5wcm9wbGlzdCIgPT4gIi5pZCxuYW1lLHN0YXJ0LWRhdGUsc3RhcnQtdGltZSIsDQogICAgICAgICAgICAiP25hbWUiID0+ICRwYXIyLA0KICAgICAgICAgICAgKSk7DQoNCiRUb3RhbFJlZ3YgPSBjb3VudCgkb2J0ZW5lcnZpZyk7DQoNCmlmKCRUb3RhbFJlZ3Y9PTEpIA0KICB7ICRvYnRlbmVydiA9ICRvYnRlbmVydmlnWzBdOw0KICAgICAgICAkc3RhcnRkYXRlID0gJG9idGVuZXJ2WydzdGFydC1kYXRlJ107DQogICAgICAgICRzdGFydGltZSA9ICRvYnRlbmVydlsnc3RhcnQtdGltZSddOw0KICAgICAgfQ0KDQogICAgICBlbHNlIHskc3RhcnRkYXRlID0iSWxpbWl0YWRvIjsNCiAgICAgICAgJHN0YXJ0aW1lID0gIiI7IH0NCiAgDQogICR1c2Vycz0gJEFQSS0+Y29tbSgiL2lwL2hvdHNwb3QvdXNlci9wcmludCIsIGFycmF5KA0KICAgICAgICAgICAgIi5wcm9wbGlzdCIgPT4gIi5pZCxuYW1lLGxpbWl0LXVwdGltZSxwYXNzd29yZCxjb21tZW50IiwNCiAgICAgICAgICAgICI/Ii4kdGlwby4iIiA9PiAkcGFyLA0KICAgICAgICAgICAgKSk7DQogICAgICANCiAgICAgIA0KICAgICAgICAkb2J0ZW5lckROUz0gJEFQSS0+Y29tbSgiL2lwL2hvdHNwb3QvcHJpbnQiLCBhcnJheSgNCiAgICAgICAgICAgICIucHJvcGxpc3QiID0+ICJpcC1vZi1kbnMtbmFtZSIsICAgICAgICAgICANCiAgICAgICAgICAgICkpOw0KICAkZG5zbmFtZSA9ICRvYnRlbmVyRE5TWzBdOw0KICAkZG5zID0gJGRuc25hbWVbJ2lwLW9mLWRucy1uYW1lJ107DQogIA0KJFRvdGFsUmVnID0gY291bnQoJHVzZXJzKTsNCg0KDQoNCg0KaWYgKCRUb3RhbFJlZz09MCl7DQogIA0KDQplY2hvICcnOw0KDQp9DQoNCg0KZWxzZSB7DQoNCg0KDQoNCmVjaG8gJzxkaXYgY2xhc3M9ImNvbnRlbmVkb3IiPic7DQogDQpmb3JlYWNoKCR1c2VycyBhcyAkaT0+JHYpICB7DQogIA0KICAkaWQgPSAkdXNlcnNbJGldWycuaWQnXTsNCiAgJG5vbWJyZSA9ICR1c2Vyc1skaV1bJ25hbWUnXTsNCg0KICBpZiAoaXNzZXQoJHVzZXJzWyRpXVsncGFzc3dvcmQnXSkpeyAgICAgDQogICAgICAkcGFzcyA9ICR1c2Vyc1skaV1bJ3Bhc3N3b3JkJ107DQogICAgfQ0KICAgIGVsc2Ugew0KICAgICAgJHBhc3MgPSIiOw0KICAgIH0NCiAgaWYgKGlzc2V0KCR1c2Vyc1skaV1bJ3Byb2ZpbGUnXSkpeyAgICAgIA0KICAgICAgJHBlcmZpbCA9ICR1c2Vyc1skaV1bJ3Byb2ZpbGUnXTsNCiAgICAgIA0KICAgIH0NCiAgICBlbHNlIHsNCiAgICAgICRwZXJmaWwgPSIwIjsNCiAgICB9DQogIA0KICANCiAgaWYgKGlzc2V0KCR1c2Vyc1skaV1bJ3VwdGltZSddKSl7ICAgICANCiAgICAgICR0aWVtcG8gPSAkdXNlcnNbJGldWyd1cHRpbWUnXTsNCiAgICB9DQogICAgZWxzZSB7DQogICAgICAkdGllbXBvPSIiOw0KICAgIH0NCiAgICBpZiAoaXNzZXQoJHVzZXJzWyRpXVsnbGltaXQtdXB0aW1lJ10pKXsgICAgIA0KICAgICAgJGx0aWVtcG8gPWNvbnZlcnR0aW1lKCR1c2Vyc1skaV1bJ2xpbWl0LXVwdGltZSddKTsNCiAgICAgDQogICAgICANCiAgICB9DQogICAgZWxzZSB7DQogICAgICAkbHRpZW1wbyA9IklsaW1pdGFkbyI7DQogICAgfQ0KICAgIGlmIChpc3NldCgkdXNlcnNbJGldWydieXRlcy1vdXQnXSkpeyAgICAgIA0KICAgICAgJGJ5dHMgPSAkdXNlcnNbJGldWydieXRlcy1vdXQnXTsNCiAgICB9DQogICAgZWxzZSB7DQogICAgICAkYnl0cyAgPSIiOw0KICAgIH0NCiAgICBpZiAoaXNzZXQoJHVzZXJzWyRpXVsnY29tbWVudCddKSl7ICAgICAgDQogICAgICAkY29tZW50YXJpb3ggPSR1c2Vyc1skaV1bJ2NvbW1lbnQnXTsNCiAgICAgICRjb21lbnRhcmlvMj1leHBsb2RlKCIgIiwkY29tZW50YXJpb3gpOw0KICAgICAgJGNvbWVudGFyaW89JG1vbmVkYS4iICAiLm51bWJlcl9mb3JtYXQoJGNvbWVudGFyaW8yWzBdLCAyLCAnLicsICcsJyk7IA0KICAgICAgDQogICAgfQ0KICAgIGVsc2Ugew0KICAgICAgJGNvbWVudGFyaW8gPSIiOw0KICAgIH0NCg0KDQoNCg0KDQoNCiAkYXJyZWdsbz1hcnJheQ0KICAoDQogICAgICJsb2dvIj0+JGxvZ28sDQogICAgImVuY2FiZXphZG8iPT4kdGV4dG9zLCAgICANCiAgICAiaWR1c2VybmFtZSI9PiRpZHVzZXIsDQogICAgImlkcGFzc3dvcmQiPT4kaWRwYXNzLA0KICAgICJ1c2VybmFtZSI9PiRub21icmUsDQogICAgInBhc3N3b3JkIj0+JHBhc3MsDQogICAgInRpZW1wbyI9PiRsdGllbXBvLA0KICAgICJwcmVjaW8iPT4kY29tZW50YXJpbywNCiAiY2FkY29ydGEiPT4kc3RhcnRkYXRlLA0KImNhZGxhcmdhIj0+JHN0YXJ0ZGF0ZS4nICcuJHN0YXJ0aW1lDQogICk7';

$phpqr='PD9waHANCg0KIA0KIGZ1bmN0aW9uIGNvbnZlcnR0aW1lKCRkYXRlKXsNCg0KaWYoJGRhdGU9PSIydzFkIil7JGRhdGU9IjE1LURJQVMiO31pZigkZGF0ZT09IjR3MmQiKXskZGF0ZT0iMS1NRVMiOyB9DQokbWlrcm90aWsgPSBhcnJheSgncycsICdtJywgJzFoJywnaCcsICcxZCcsICdkJywgJzF3JywgJ3cnKTsNCiRlc3AgPSBhcnJheSgnLVNlZy4nLCAnLU1pbnV0b3MgJywgJyAxLUhvcmEgJywgJy1Ib3JhcyAnLCAnMS1Ew61hICcsICctRMOtYXMgJywgJzEtU2VtYW5hICcsICctU2VtYW5hcyAnKTsNCnJldHVybiBzcHJpbnRmKHN0cl9yZXBsYWNlKCRtaWtyb3RpaywgJGVzcCwgJGRhdGUpKTsNCn0gDQoNCmlmIChpc3NldCgkX1BPU1RbJ29wY2lvbiddKSl7DQogIA0KcmVxdWlyZSgiLi4vcmVxdWlyZS9jb25uZWN0X2RiLnBocCIpOw0KDQokY29uc3VsdD0oIlNFTEVDVCAqIEZST00gc2lzdGVtYSB3aGVyZSAgaWQ9JzEnIik7DQokbD1teXNxbGlfcXVlcnkoJG15c3FsaSwkY29uc3VsdCk7DQokcD1teXNxbGlfZmV0Y2hfYXJyYXkoJGwpOyAgICAgICAgICAgDQokbG9nbz0nLi4vJy4kcFsnbG9nbyddOyANCiRpZHVzZXI9JHBbJ2lkdXN1YXJpbyddOyAgDQokaWRwYXNzPSRwWydpZHBhc3N3b3JkJ107IA0KJHRleHQ9JHBbJ3RleHRvJ107DQoNCg0KcmVxdWlyZSgiLi4vcmVxdWlyZS9jb25uZWN0X2RiLnBocCIpOw0KcmVxdWlyZV9vbmNlICcuLi9yZXF1aXJlL3JvdXRlcmJvYXJkLnBoYXInOw0KDQogICAgICAgDQogICAgICAgICAgICAgICRvYnRlbmVyZGE9KCJTRUxFQ1QgKiBGUk9NIHNpc3RlbWEiKTsNCiAgICAgICAgICAgICAgJGRhdGF4PW15c3FsaV9xdWVyeSgkbXlzcWxpLCRvYnRlbmVyZGEpOyAgICANCiAgICAgICAgICAgICAgJGRhdGE9bXlzcWxpX2ZldGNoX2FycmF5KCRkYXRheCk7IA0KICAgICAgICAgICAgICAkbW9uZWRhPSRkYXRhWydtb25lZGEnXTsNCg0KDQokdXN1YXJpbz0kX1NFU1NJT05bInVzZXJuYW1lIl07DQoNCiAgICRvYnRlbmVyaWRzdT0oIlNFTEVDVCAqIEZST00gcm91dGVyYm9hcmQgV0hFUkUgdXN1YXJpbz0nJHVzdWFyaW8nIik7DQogICAgICAgICAgICAgICRkYXRhc3VjdXJzYWw9bXlzcWxpX3F1ZXJ5KCRteXNxbGksJG9idGVuZXJpZHN1KTsgICAgDQogICAgICAgICAgICAgICRkYXRhcz1teXNxbGlfZmV0Y2hfYXJyYXkoJGRhdGFzdWN1cnNhbCk7ICAgICAgICAgICAgIA0KICAgICAgICAgICAgICAkaWRzdWN1cnNhbD0kZGF0YXNbJ2lkc3VjdXJzYWwnXTsNCg0KICAgICAgICAgICAgICRvYnRlbmVyaWRzdWN1cnNhbD0oIlNFTEVDVCAqIEZST00gc3VjdXJzYWwgV0hFUkUgaWQ9JyRpZHN1Y3Vyc2FsJyIpOw0KICAgICAgICAgICAgICAkZGF0YXN1Y3Vyc2FsPW15c3FsaV9xdWVyeSgkbXlzcWxpLCRvYnRlbmVyaWRzdWN1cnNhbCk7ICAgIA0KICAgICAgICAgICAgICAkZGF0YXNzPW15c3FsaV9mZXRjaF9hcnJheSgkZGF0YXN1Y3Vyc2FsKTsgICAgICAgICAgICAgDQogICAgICAgICAgICAgICR0ZXh0b3M9JGRhdGFzc1sndGV4dG8nXSAgOyANCiAgDQpyZXF1aXJlX29uY2UgJy4uL3JlcXVpcmUvcm91dGVyYm9hcmRQREYucGhhcic7DQokdGlwbz0kX1BPU1RbJ29wY2lvbiddOyANCiRwYXIyPSRfUE9TVFsncGFyYW1ldHJvJ107IA0KJHBhciA9IHN0cl9yZXBsYWNlKCdgJywgJyInLCAkcGFyMik7DQoNCmlmICgkQVBJLT5jb25uZWN0KCRpcCwkVXN1YXJpbywkcGFzc3dvcmQsJHB1ZXJ0bykpIHsNCg0KDQokb2J0ZW5lcnZpZz0gJEFQSS0+Y29tbSgiL3N5c3RlbS9zY2hlZHVsZS9wcmludCIsIGFycmF5KA0KICAgICAgICAgICAgIi5wcm9wbGlzdCIgPT4gIi5pZCxuYW1lLHN0YXJ0LWRhdGUsc3RhcnQtdGltZSIsDQogICAgICAgICAgICAiP25hbWUiID0+ICRwYXIyLA0KICAgICAgICAgICAgKSk7DQoNCiRUb3RhbFJlZ3YgPSBjb3VudCgkb2J0ZW5lcnZpZyk7DQoNCmlmKCRUb3RhbFJlZ3Y9PTEpIA0KICB7ICRvYnRlbmVydiA9ICRvYnRlbmVydmlnWzBdOw0KICAgICAgICAkc3RhcnRkYXRlID0gJG9idGVuZXJ2WydzdGFydC1kYXRlJ107DQogICAgICAgICRzdGFydGltZSA9ICRvYnRlbmVydlsnc3RhcnQtdGltZSddOw0KICAgICAgfQ0KDQogICAgICBlbHNlIHskc3RhcnRkYXRlID0iSWxpbWl0YWRvIjsNCiAgICAgICAgJHN0YXJ0aW1lID0gIiI7IH0NCiAgDQogICR1c2Vycz0gJEFQSS0+Y29tbSgiL2lwL2hvdHNwb3QvdXNlci9wcmludCIsIGFycmF5KA0KICAgICAgICAgICAgIi5wcm9wbGlzdCIgPT4gIi5pZCxuYW1lLGxpbWl0LXVwdGltZSxwYXNzd29yZCxjb21tZW50IiwNCiAgICAgICAgICAgICI/Ii4kdGlwby4iIiA9PiAkcGFyLA0KICAgICAgICAgICAgKSk7DQogICAgICANCiAgICAgIA0KICAgICAgICAkb2J0ZW5lckROUz0gJEFQSS0+Y29tbSgiL2lwL2hvdHNwb3QvcHJpbnQiLCBhcnJheSgNCiAgICAgICAgICAgICIucHJvcGxpc3QiID0+ICJpcC1vZi1kbnMtbmFtZSIsICAgICAgICAgICANCiAgICAgICAgICAgICkpOw0KICAkZG5zbmFtZSA9ICRvYnRlbmVyRE5TWzBdOw0KICAkZG5zID0gJGRuc25hbWVbJ2lwLW9mLWRucy1uYW1lJ107DQogIA0KJFRvdGFsUmVnID0gY291bnQoJHVzZXJzKTsNCg0KDQoNCg0KaWYgKCRUb3RhbFJlZz09MCl7DQogIA0KDQplY2hvICcnOw0KDQp9DQoNCg0KZWxzZSB7DQoNCg0KJENhcnBldGFxcj0kdXN1YXJpby4iLyI7DQokZmlsZXMgPSBnbG9iKCRDYXJwZXRhcXIuJy8qJyk7IC8vb2J0ZW5lbW9zIHRvZG9zIGxvcyBub21icmVzIGRlIGxvcyBmaWNoZXJvcw0KZm9yZWFjaCgkZmlsZXMgYXMgJGZpbGUpew0KICAgIGlmKGlzX2ZpbGUoJGZpbGUpKQ0KICAgIHVubGluaygkZmlsZSk7IC8vZWxpbWlubyBlbCBmaWNoZXJvDQp9DQoNCg0KZWNobyAnPGRpdiBjbGFzcz0iY29udGVuZWRvciI+JzsNCiANCmZvcmVhY2goJHVzZXJzIGFzICRpPT4kdikgIHsNCiAgDQogICRpZCA9ICR1c2Vyc1skaV1bJy5pZCddOw0KICAkbm9tYnJlID0gJHVzZXJzWyRpXVsnbmFtZSddOw0KDQogIGlmIChpc3NldCgkdXNlcnNbJGldWydwYXNzd29yZCddKSl7ICAgICANCiAgICAgICRwYXNzID0gJHVzZXJzWyRpXVsncGFzc3dvcmQnXTsNCiAgICB9DQogICAgZWxzZSB7DQogICAgICAkcGFzcyA9IiI7DQogICAgfQ0KICBpZiAoaXNzZXQoJHVzZXJzWyRpXVsncHJvZmlsZSddKSl7ICAgICAgDQogICAgICAkcGVyZmlsID0gJHVzZXJzWyRpXVsncHJvZmlsZSddOw0KICAgICAgDQogICAgfQ0KICAgIGVsc2Ugew0KICAgICAgJHBlcmZpbCA9IjAiOw0KICAgIH0NCiAgDQogIA0KICBpZiAoaXNzZXQoJHVzZXJzWyRpXVsndXB0aW1lJ10pKXsgICAgIA0KICAgICAgJHRpZW1wbyA9ICR1c2Vyc1skaV1bJ3VwdGltZSddOw0KICAgIH0NCiAgICBlbHNlIHsNCiAgICAgICR0aWVtcG89IiI7DQogICAgfQ0KICAgIGlmIChpc3NldCgkdXNlcnNbJGldWydsaW1pdC11cHRpbWUnXSkpeyAgICAgDQogICAgICAkbHRpZW1wbyA9Y29udmVydHRpbWUoJHVzZXJzWyRpXVsnbGltaXQtdXB0aW1lJ10pOw0KICAgICANCiAgICAgIA0KICAgIH0NCiAgICBlbHNlIHsNCiAgICAgICRsdGllbXBvID0iSWxpbWl0YWRvIjsNCiAgICB9DQogICAgaWYgKGlzc2V0KCR1c2Vyc1skaV1bJ2J5dGVzLW91dCddKSl7ICAgICAgDQogICAgICAkYnl0cyA9ICR1c2Vyc1skaV1bJ2J5dGVzLW91dCddOw0KICAgIH0NCiAgICBlbHNlIHsNCiAgICAgICRieXRzICA9IiI7DQogICAgfQ0KICAgIGlmIChpc3NldCgkdXNlcnNbJGldWydjb21tZW50J10pKXsgICAgICANCiAgICAgICRjb21lbnRhcmlveCA9JHVzZXJzWyRpXVsnY29tbWVudCddOw0KICAgICAgJGNvbWVudGFyaW8yPWV4cGxvZGUoIiAiLCRjb21lbnRhcmlveCk7DQogICAgJGNvbWVudGFyaW89JG1vbmVkYS4iICAiLm51bWJlcl9mb3JtYXQoJGNvbWVudGFyaW8yWzBdLCAyLCAnLicsICcsJyk7IA0KICAgICAgDQogICAgfQ0KICAgIGVsc2Ugew0KICAgICAgJGNvbWVudGFyaW8gPSIiOw0KICAgIH0NCg0KIGluY2x1ZGVfb25jZSgiZ2VuZXJhdGVxci5saWIiKTsNCg0KDQoNCiRxciA9IG5ldyBRUkNvZGUoKTsNCg0KLy8gUVJfRVJST1JfQ09SUkVDVF9MRVZFTF9MIDogNyUNCi8vIFFSX0VSUk9SX0NPUlJFQ1RfTEVWRUxfTSA6IDE1JQ0KDQokcXItPnNldEVycm9yQ29ycmVjdExldmVsKFFSX0VSUk9SX0NPUlJFQ1RfTEVWRUxfTSk7DQokcXItPnNldFR5cGVOdW1iZXIoNCk7DQoNCg0KDQogIGlmKCRwYXNzPT0kbm9tYnJlKXsNCg0KICRtc2dxcj0gJ2h0dHA6Ly8nLiRkbnMuJy9sb2dpbj91c2VybmFtZT0nLiRub21icmUuJyZwYXNzd29yZD0nLiRwYXNzOyAgIA0KJHFyLT5hZGREYXRhKCRtc2dxcik7DQokcXItPm1ha2UoKTsNCiANCiRxci0+cHJpbnRTVkcoJENhcnBldGFxciwkbm9tYnJlLDIpOw0KJHFyY29kZT0kQ2FycGV0YXFyLiRub21icmUuIi5zdmciOw0KDQoNCiAgIH0NCmVsc2Ugew0KJG1zZ3FyPSAnaHR0cDovLycuJGRucy4nL2xvZ2luP3VzZXJuYW1lPScuJG5vbWJyZS4nJnBhc3N3b3JkPScuJHBhc3M7ICANCiRxci0+YWRkRGF0YSgkbXNncXIpOw0KJHFyLT5tYWtlKCk7DQogDQokcXItPnByaW50U1ZHKCRDYXJwZXRhcXIsJG5vbWJyZSwyKTsNCiRxcmNvZGU9JENhcnBldGFxci4kbm9tYnJlLiIuc3ZnIjsNCg0KICAgfQ0KDQokYXJyZWdsbz1hcnJheQ0KICAoICAiY29kZXFyIj0+JHFyY29kZSwNCiAgICAgImxvZ28iPT4kbG9nbywNCiAgICAiZW5jYWJlemFkbyI9PiR0ZXh0b3MsICAgIA0KICAgICJpZHVzZXJuYW1lIj0+JGlkdXNlciwNCiAgICAiaWRwYXNzd29yZCI9PiRpZHBhc3MsDQogICAgInVzZXJuYW1lIj0+JG5vbWJyZSwNCiAgICAicGFzc3dvcmQiPT4kcGFzcywNCiAgICAidGllbXBvIj0+JGx0aWVtcG8sDQogICAgInByZWNpbyI9PiRjb21lbnRhcmlvLA0KICJjYWRjb3J0YSI9PiRzdGFydGRhdGUsDQoiY2FkbGFyZ2EiPT4kc3RhcnRkYXRlLicgJy4kc3RhcnRpbWUNCiAgKTs=';

$phplogo=base64_decode($phplogo);
$phpqr=base64_decode($phpqr);



$htmlcard=base64_decode('JGh0bWw9Jw==') .$_POST["htmlcard"]."';";

$printcard='foreach($arreglo as $Varx=>$Des) 
  {
        $html=str_replace("[".$Varx."]",$Des,$html);
  }

  print $html;';

  $final='ZWNobyAiPC9kaXY+IjsNCg0KfQ0KDQoNCg0KDQp9fQ0KZWxzZSB7DQogIHJlcXVpcmUoJy4uL2luY2x1ZGVzL2hlYWRlci5waHAnKTsNCmVjaG8gJzxkaXYgY2xhc3M9ImhvdmVyOmJnLXB1cnBsZS0zMDAgYmctbmV1dHJhbC01MCBmb250LWJvbGQgdGV4dC1pbmRpZ28tNTAwIHJvdW5kZWQgcC0yIiAgPg0KICAgIExvIHNpZW50byBubyBlcyBwb3NpYmxlIGdlbmVyYXIgdXN1YXJpb3Mgc2luIGRlZmluaXIgbG9zIHBhcsOhbWV0cm9zIG5lY2VzYXJpb3MsIGNpZXJyZSBsYSB2ZW50YW5hIHkgZ2VuZXJlIGRlc2RlIHN1IGZvcm11bGFyaW8gIQ0KICA8L2Rpdj4NCiAgJzsgIA0KICANCn19DQoNCj8+DQoNCg0KDQogDQo8L2JvZHk+DQo8L2h0bWw+';
$final=base64_decode($final);




$plantilla=$_POST["nombrep"].".php";
$modelo=$_POST["model"];

if($modelo=="qr"){

  $codephpprint=$phpqr;
}

else {$codephpprint=$phplogo;}




$carpetaplantillas='../../custom/';
$carpetaestilos='../../custom/estilos/';
$carpetahtml='../../custom/html/';

$fileconect=$carpetaplantillas.$plantilla;

$archivocss=$carpetaestilos.$_POST["nombrep"].'.css';
$archivohtml=$carpetahtml.$_POST["nombrep"].'.html';
 

 
if (!file_exists($carpetahtml)) {
    mkdir($carpetahtml, 0777, true);
}

if (!file_exists($carpetaestilos)) {
    mkdir($carpetaestilos, 0777, true);
}
if (!file_exists($carpetaplantillas)) {
    mkdir($carpetaplantillas, 0777, true);
}


$css=$_POST["css"];
$html=$_POST["htmlcard"];



$linkestilos=' <link rel="stylesheet" href="'.$archivocss.'">';
$archivocss=fopen($archivocss, 'w');
$archivohtml=fopen($archivohtml, 'w');

if($archivocss)
{fwrite($archivocss, $css. PHP_EOL);
 
fclose($archivocss);

}

if($archivocss)
{fwrite($archivohtml, $html. PHP_EOL);
 
fclose($archivohtml);

}



$archivo=fopen($fileconect, 'w');

if($archivo)
{	fwrite($archivo, $htmlinicio. PHP_EOL);
 fwrite($archivo, $linkestilos. PHP_EOL);
  fwrite($archivo, $codephpprint. PHP_EOL);
 fwrite($archivo, $htmlcard. PHP_EOL);
 fwrite($archivo, $printcard. PHP_EOL);
 fwrite($archivo, $final. PHP_EOL);
fclose($archivo);


  $data=1;

print json_encode($data);
 


}

else {

$data=3;

print json_encode($data);
}
?>