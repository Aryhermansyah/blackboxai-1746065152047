-- Create wedding_organizer database
CREATE DATABASE IF NOT EXISTS wedding_organizer;
USE wedding_organizer;

-- Create couples table
CREATE TABLE couples (
    id INT PRIMARY KEY AUTO_INCREMENT,
    wedding_date DATE NOT NULL,
    venue VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    cover_photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create biodata table
CREATE TABLE biodata (
    id INT PRIMARY KEY AUTO_INCREMENT,
    couple_id INT,
    type ENUM('groom', 'bride') NOT NULL,
    name VARCHAR(255) NOT NULL,
    father_name VARCHAR(255) NOT NULL,
    mother_name VARCHAR(255) NOT NULL,
    child_number VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    instagram VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (couple_id) REFERENCES couples(id) ON DELETE CASCADE
);

-- Create event_summary table
CREATE TABLE event_summary (
    id INT PRIMARY KEY AUTO_INCREMENT,
    couple_id INT,
    event_type ENUM('akad', 'temu', 'resepsi') NOT NULL,
    event_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    expected_guests INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (couple_id) REFERENCES couples(id) ON DELETE CASCADE
);

-- Create vendors table
CREATE TABLE vendors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(100) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create team_members table
CREATE TABLE team_members (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    role VARCHAR(100) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create rundown_segments table
CREATE TABLE rundown_segments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    couple_id INT,
    segment_type ENUM('loading_crew', 'akad', 'temu_manten', 'resepsi') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    task VARCHAR(255) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (couple_id) REFERENCES couples(id) ON DELETE CASCADE
);

-- Create rundown_assignments table (for vendors and team assignments to rundown segments)
CREATE TABLE rundown_assignments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    rundown_segment_id INT,
    assignee_type ENUM('vendor', 'team_member') NOT NULL,
    assignee_id INT NOT NULL,
    responsibility TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rundown_segment_id) REFERENCES rundown_segments(id) ON DELETE CASCADE
);

-- Insert sample data
INSERT INTO couples (wedding_date, venue, location, cover_photo) VALUES
('2024-03-15', 'Grand Ballroom Hotel Mulia', 'Jakarta Selatan', 'https://images.pexels.com/photos/2959192/pexels-photo-2959192.jpeg');

-- Insert biodata
INSERT INTO biodata (couple_id, type, name, father_name, mother_name, child_number, address, phone, instagram) VALUES
(1, 'groom', 'Ahmad Fadillah', 'H. Sulaiman', 'Hj. Aminah', 'Anak ke-2 dari 3 bersaudara', 'Jl. Melati No. 123, Jakarta Selatan', '081234567890', '@ahmadfadillah'),
(1, 'bride', 'Fatima Azzahra', 'H. Abdullah', 'Hj. Khadijah', 'Anak ke-1 dari 2 bersaudara', 'Jl. Anggrek No. 456, Jakarta Timur', '089876543210', '@fatimaazzahra');

-- Insert event summary
INSERT INTO event_summary (couple_id, event_type, event_date, start_time, end_time, expected_guests) VALUES
(1, 'akad', '2024-03-15', '09:00:00', '10:00:00', 50),
(1, 'temu', '2024-03-15', '10:30:00', '11:30:00', 100),
(1, 'resepsi', '2024-03-15', '12:00:00', '15:00:00', 500);

-- Insert vendors
INSERT INTO vendors (name, type, contact, email) VALUES
('Elegant Decor', 'Decoration', '081234567890', 'elegant@decor.com'),
('Divine Photography', 'Photography', '087654321098', 'divine@photo.com'),
('Heavenly Catering', 'Catering', '089876543210', 'heavenly@catering.com'),
('Sound Master', 'Sound System', '081122334455', 'sound@master.com');

-- Insert team members
INSERT INTO team_members (name, role, contact) VALUES
('Sarah Johnson', 'Wedding Coordinator', '081122334455'),
('Michael Lee', 'Assistant Coordinator', '082233445566'),
('Lisa Chen', 'Decoration Coordinator', '083344556677'),
('John Smith', 'Technical Coordinator', '084455667788');

-- Insert rundown segments
INSERT INTO rundown_segments (couple_id, segment_type, start_time, end_time, task, notes) VALUES
(1, 'loading_crew', '06:00:00', '07:00:00', 'Team Briefing', 'All crew must arrive on time'),
(1, 'loading_crew', '07:00:00', '08:00:00', 'Venue Setup', 'Check all decorations'),
(1, 'akad', '08:00:00', '09:00:00', 'Preparation', 'Bride & Groom makeup'),
(1, 'akad', '09:00:00', '10:00:00', 'Akad Ceremony', 'Main ceremony'),
(1, 'temu_manten', '10:30:00', '11:00:00', 'Temu Manten Ceremony', 'Traditional meeting ceremony'),
(1, 'temu_manten', '11:00:00', '11:30:00', 'Family Photos', 'Group photos with family'),
(1, 'resepsi', '12:00:00', '13:00:00', 'Guest Reception', 'Welcome drinks and snacks'),
(1, 'resepsi', '13:00:00', '15:00:00', 'Main Reception', 'Lunch and entertainment');

-- Insert rundown assignments
INSERT INTO rundown_assignments (rundown_segment_id, assignee_type, assignee_id, responsibility) VALUES
-- Loading Crew assignments
(1, 'team_member', 1, 'Overall coordination and briefing'),
(1, 'team_member', 2, 'Team attendance and task distribution'),
(2, 'vendor', 1, 'Setup main decoration'),
(2, 'team_member', 3, 'Supervise decoration setup'),
-- Akad assignments
(3, 'vendor', 2, 'Pre-ceremony photo session'),
(3, 'team_member', 1, 'Coordinate with makeup artist'),
(4, 'vendor', 2, 'Ceremony documentation'),
(4, 'team_member', 1, 'Ceremony coordination'),
-- Temu Manten assignments
(5, 'vendor', 2, 'Traditional ceremony documentation'),
(5, 'team_member', 2, 'Guide traditional ceremony'),
(6, 'vendor', 2, 'Family photo session'),
(6, 'team_member', 2, 'Coordinate family members'),
-- Resepsi assignments
(7, 'vendor', 3, 'Manage food service'),
(7, 'team_member', 1, 'Guest reception coordination'),
(8, 'vendor', 4, 'Manage sound and entertainment'),
(8, 'team_member', 4, 'Technical coordination');
