
users (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
)


teams (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    created_by BIGINT, -- FK → users.id
    captain_id BIGINT, -- FK → users.id
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
)

team_members (
    id BIGINT PRIMARY KEY,
    user_id BIGINT UNIQUE, 
    team_id BIGINT,
    role ENUM('captain', 'player'),
    joined_at TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
) 

roles (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    guard_name VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) 

permissions (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    guard_name VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) 

model_has_roles (
    role_id BIGINT UNSIGNED,
    model_type VARCHAR(255),
    model_id BIGINT UNSIGNED
)


model_has_permissions (
    permission_id BIGINT UNSIGNED,
    model_type VARCHAR(255),
    model_id BIGINT UNSIGNED
)





team_invites (
    id BIGINT PRIMARY KEY,
    team_id BIGINT,
    invited_user_id BIGINT,
    invited_by BIGINT,
    status ENUM('pending', 'accepted', 'rejected'),

    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP,

    UNIQUE(team_id, invited_user_id) 
)


/*
- roles : team/player/admin
- reg as ateam
- team pnel
    - operation
    - add/remove
    - team profile
    - plaer profile
    - inviations
- sports calender
- sports match making via request
- different type of tournaments
- front end 
*/