CREATE VIEW ratings_view AS

SELECT playlist.id As playlist_id, image_url, name, public, rating, comment, first_name, last_name, email, security_level, username

FROM playlist, playlist_ratings, users
WHERE
		playlist_ratings.playlist_id = playlist.id
	AND
		playlist_ratings.user_id = users.id
        
ORDER BY playlist.id;