CREATE VIEW playlist_users_view AS

SELECT playlist.id As playlist_id, image_url, name, public, orig_user_id, users.id AS user_id, first_name, last_name, email, security_level, username

FROM playlist, playlist_users, users
WHERE
		playlist_users.playlist_id = playlist.id
	AND
		playlist_users.user_id = users.id
        
ORDER BY playlist.id;