CREATE VIEW playlist_songs_view AS

SELECT 
playlist.id AS playlist_id, image_url, playlist.name AS playlist_name, public, orig_user_id, first_name, last_name, email, song.id AS song_id, song.name AS song_name, spotify_id

FROM playlist, playlist_songs, song, playlist_users, users
WHERE
		playlist_songs.playlist_id = playlist.id
	AND
		playlist_songs.song_id = song.id
	AND
		playlist_users.playlist_id = playlist.id
	AND
		playlist_users.orig_user_id = users.id
        
ORDER BY playlist.id;