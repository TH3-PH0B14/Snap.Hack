#!/bin/bash

clear

# Color variables
CYAN='\033[0;36m'
YELLOW='\033[1;33m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# Function to check if PHP is installed
check_php_installed() {
    if ! command -v php &> /dev/null; then
        return 1
    fi
    return 0
}

# Function to install PHP
install_php() {
    echo -e "${YELLOW}PHP is not installed or found.${NC}"
    read -p "Would you like to install PHP? (y/n): " choice
    if [ "$choice" == "y" ] || [ "$choice" == "Y" ]; then
        sudo apt-get update
        sudo apt-get install php -y
    fi
}

# Function to start the server
start_server() {
    clear

    # Print colored banner
    echo -e "${CYAN}   ____                 __ __         __   "
    echo -e "  / __/__  ___ ____    / // /__ _____/ /__ "
    echo -e " _\\ \/ _ \/ _ \`/ _ \_ / _  / _ \`/ __/  '_/ "
    echo -e "/___/_//_/\_,_/ .__(_)_//_/\_,_/\__/_/\_\ "
    echo -e "             /_/${NC}"
    echo -e ""
    echo -e "❤️ Made by: Not3 & PH0B14"
    echo -e ""

    echo -n -e "${GREEN}Enter the port number to use for server: ${NC}"
    read port

    echo -n -e "${GREEN}Enter the port number to use for logs: ${NC}"
    read port2

    # Start PHP localhost server if PHP is installed
    if check_php_installed; then
        php -S 127.0.0.1:$port > /dev/null 2>&1 &
        cd snap/logs
        php -S 127.0.0.1:$port2 > /dev/null 2>&1 &
        echo -e "\nServer: ${YELLOW}http://localhost:$port${NC}"
        echo -e "\nLogs: ${YELLOW}http://localhost:$port2${NC}"
        echo -e ""
        read -p "Press Enter to Stop..."
        kill $!
    else
        echo -e "${YELLOW}PHP is not installed. Cannot start the server.${NC}"
    fi
}

# Print colored banner
echo -e "${CYAN}   ____                 __ __         __   "
echo -e "  / __/__  ___ ____    / // /__ _____/ /__ "
echo -e " _\\ \/ _ \/ _ \`/ _ \_ / _  / _ \`/ __/  '_/ "
echo -e "/___/_//_/\_,_/ .__(_)_//_/\_,_/\__/_/\_\ "
echo -e "             /_/${NC}"
echo -e ""
echo -e "${GREEN}❤️ Made by: Not3 & PH0B14${NC}"
echo -e ""


# Check if PHP is installed
if ! check_php_installed; then
    install_php
fi

# Display menu options
echo -e "1) ${YELLOW}Start Server${NC}"
echo -e ""
echo -e "2) ${YELLOW}Exit${NC}"
echo -e ""

# Prompt for user option
echo -n -e "Choose an option: ${GREEN}"
read option
echo -e "${NC}" # Reset color

# Handle user option
case $option in
    1)
        start_server
        ;;
    2)
        echo "Exiting..."
        exit 0
        ;;
    *)
        echo "Invalid option!"
        ;;
esac
