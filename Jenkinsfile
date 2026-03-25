pipeline {
    agent {
        label 'laravel-agent-I4C'
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }

        stage('Setup Environment') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
                sh 'touch database/database.sqlite'
                sh 'php artisan migrate --force'
            }
        }

        stage('NPM Build') {
            steps {
                sh 'npm install'
                sh 'npm run build'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }

        stage('Deploy with Ansible') {
            steps {
                sh 'ansible-playbook -i ansible/inventory.ini ansible/deploy.yml -v'
            }
        }
    }

    post {
        success {
            echo 'All tests passed! CI/CD pipeline completed successfully.'
        }
        failure {
            echo 'Pipeline failed. Check logs for details.'
        }
    }
}
