# Backend Plan for Review Ratings App

## Overview
The frontend is a "Review Ratings" app that combines polls/voting with user profiles, PSI scoring, following, and media management. The current backend is polls-focused, but needs to support:

- User profiles with PSI scores
- Profile voting (not just poll options)
- Following system
- Media galleries
- Achievements and announcements
- Social media integration
- Categories for business profiles
- Trending profiles

## Current Schema Analysis
Current tables:
- polls, poll_options, votes, poll_invitations (references users but table missing)
- Missing: users, user_profiles, following, media, achievements, announcements, social_links, categories

## New Schema Requirements

### Core Tables
- **users** - Basic user info
- **user_profiles** - Extended profile data (PSI scores, bio, etc.)
- **categories** - Business categories (Education, Financial, etc.)
- **profile_votes** - Votes on user profiles (1-10 scale)
- **following** - Follow/follower relationships
- **media** - Photos/videos for profiles
- **achievements** - User achievements/awards
- **announcements** - User announcements/updates
- **social_links** - Connected social media accounts

### PSI Calculation Logic
PSI (Public Sentiment Index) appears to be:
- Based on profile votes (rating out of 10)
- Calculated per profile
- Used for rankings and trending

## API Endpoints to Implement

### User Management
- GET /users/me - Current user profile
- GET /users/{id} - Public profile view
- PUT /users/me - Update profile
- GET /categories - List categories

### Voting System
- POST /vote-profile - Vote on a user profile (1-10 rating)
- GET /my-votes - User's voting history

### Social Features
- POST /follow/{user_id} - Follow user
- DELETE /unfollow/{user_id} - Unfollow user
- GET /followers/{user_id} - Get followers
- GET /following/{user_id} - Get following

### Media Management
- POST /media - Upload media
- GET /media/{user_id} - Get user media
- DELETE /media/{media_id} - Delete media

### Content Management
- POST /achievements - Add achievement
- GET /achievements/{user_id} - Get achievements
- POST /announcements - Add announcement
- GET /announcements/{user_id} - Get announcements

### Scoring & Analytics
- GET /leaderboard - PSI-based rankings
- GET /trending - Trending profiles
- GET /psi/{user_id} - Calculate PSI score

### Enhanced Polls
- Support profile-based polls alongside regular polls
- My Invitations feature (existing)

## Implementation Priority
1. Database schema updates
2. User profile system
3. Profile voting and PSI calculation
4. Following system
5. Media management
6. Enhanced leaderboard
7. Content features (achievements, announcements)
8. Trending profiles

## Technical Notes
- Use existing session-based auth
- Extend current poll system rather than replace
- PSI calculation: Average rating * (number of votes / log(time factor))
- Maintain backward compatibility with existing polls